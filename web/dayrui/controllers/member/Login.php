<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends M_Controller {

	/**
	 * 登录
	 */
	public function index() {

		$data = $error = $success = '';
		$MEMBER = $this->get_cache('member');

		if (IS_POST) {
			$data = $this->input->post('data', TRUE);
			$back_url = $_POST['back'] ? urldecode($this->input->post('back', true)) : '';
			$back_url = $back_url && strpos($back_url, 'register') === FALSE ? $back_url : dr_member_url('home/index');
			if ($MEMBER['setting']['logincode'] && !$this->check_captcha('code')) {
				$error = fc_lang('验证码不正确');
			} elseif (!$data['password'] || !$data['username']) {
				$error = fc_lang('输入不完整');
			} else {
				$code = $this->member_model->login($data['username'], $data['password'], $data['auto'] ? 864000000 : $MEMBER['setting']['loginexpire']);
				if (strlen($code) > 3) {
					// 登录成功
					$data['uid'] = $this->uid;
					$this->hooks->call_hook('member_login', $data); // 登录成功挂钩点
					$success = $code;
				} elseif ($code == -1) {
					$error = fc_lang('会员不存在');
				} elseif ($code == -2) {
					$error = fc_lang('密码不正确');
				} elseif ($code == -3) {
					$error = fc_lang('注册失败');
				} elseif ($code == -4) {
					$error = fc_lang('会员名称不合法');
				} elseif ($code == -5) {
					$error = fc_lang('uid同步失败');
				} elseif ($code == -404) {
					$error = fc_lang('服务端网络连接失败');
				} else {
                    $error = fc_lang('登录失败');
                }
			}
			if (IS_AJAX) {
				$error && exit(dr_json(0, $error));
				$success && exit(json_encode(array(
					'status' => 1,
					'backurl' => $back_url,
					'isdebug' => $_GET['debug'],
					'syncurl' => dr_member_sync_url($success))));
			}
			$success && $this->member_msg(fc_lang('登录成功').$success, $back_url, 1, $_GET['debug'] ? 99999 : 3);
            exit('error');
		} else {
			$back_url = $this->input->get('back') ? $this->input->get('back') : (isset($_SERVER['HTTP_REFERER']) ? (strpos($_SERVER['HTTP_REFERER'], 'login') !== false ? '' : $_SERVER['HTTP_REFERER']) : '');
		}

		$this->template->assign(array(
			'data' => $data,
			'code' => $MEMBER['setting']['logincode'],
			'back_url' => $back_url,
			'meta_title' => fc_lang('会员登录'),
			'result_error' => $error,
		));
		$this->template->display('login.html');
	}

	/**
	 * Ajax 登录
	 */
	public function ajax() {

		$login = $data = $error = '';
		$MEMBER = $this->get_cache('member');

		if (IS_POST) {
			$data = $this->input->post('data', TRUE);
			if ($MEMBER['setting']['logincode'] && !$this->check_captcha('code')) {
				$error = fc_lang('验证码不正确');
			} elseif (!$data['password'] || !$data['username']) {
				$error = fc_lang('输入不完整');
			} else {
				$code = $this->member_model->login($data['username'], $data['password'], $data['auto'] ? 86400000 : $MEMBER['setting']['loginexpire']);
				if (strlen($code) > 3) {
					// 登录成功
					$this->hooks->call_hook('member_login', $data); // 登录成功挂钩点
					$login = $code;
				} elseif ($code == -1) {
					$error = fc_lang('会员不存在');
				} elseif ($code == -2) {
					$error = fc_lang('密码不正确');
				} elseif ($code == -3) {
					$error = fc_lang('Ucenter注册失败');
				} elseif ($code == -4) {
					$error = fc_lang('Ucenter：会员名称不合法');
				}
			}
		}

		$this->template->assign(array(
			'data' => $data,
			'code' => $MEMBER['setting']['logincode'],
			'login' => $login,
			'error' => $error,
			'meta_name' => fc_lang('会员登录'),
			'result_error' => $error,
		));
		$this->template->display('login_ajax.html');
		$this->output->enable_profiler(FALSE);
	}

	/**
	 * 找回密码
	 */
	public function find() {

        $auth = $this->input->get('auth');
        if ($auth) {
            if ($auth != md5(SYS_REFERER)) {
                // 授权认证码不正确
                echo $this->callback_json(array(
                    'msg' => '移动端api密钥-不正确',
                    'code' => 0
                ));exit;
            }
            define('SELECT_API_AUTH', 1);
        }

		$step = max(1, (int)$this->input->get('step'));
		$error = '';

		if (IS_POST) {
			switch ($step) {
				case 1:
					!$this->check_captcha('code') && $this->member_msg(fc_lang('验证码不正确'));
					if ($uid = get_cookie('find')) {
                        if (IS_API_AUTH || defined('SELECT_API_AUTH')) {
                            echo $this->callback_json(array(
                                'msg' => fc_lang('验证码发送成功，请注意查收'),
                                'code' => 1,
                                'uid' => $uid,
                            ));exit;
                        } else {
                            $this->member_msg(
                                fc_lang('验证码发送成功，请注意查收'),
                                dr_member_url('login/find', array('step' => 2, 'uid' => $uid)),
                                1
                            );
                        }
					} else {
						$name = $this->input->post('name', TRUE);
						$name = in_array($name, array('email', 'phone')) ? $name : 'email';
						$value = $this->input->post('value', TRUE);
						$data = $this->db
									->select('uid,username,randcode')
									->where($name, $value)
									->limit(1)
									->get('member')
									->row_array();
						if ($data) {
							$randcode = dr_randcode();
							if ($name == 'email') {
								$this->load->helper('email');
								$code = @file_get_contents(WEBPATH.'cache/email/find_password.html');
								!$this->sendmail($value, fc_lang('找回密码通知'), fc_lang($code, $data['username'], $randcode, $this->input->ip_address())) && $this->member_msg(fc_lang('邮件发送失败，请联系管理员检查邮件日志'));
								set_cookie('find', $data['uid'], 300);
								$this->db->where('uid', $data['uid'])->update('member', array('randcode' => $randcode));
                                if (IS_API_AUTH || defined('SELECT_API_AUTH')) {
                                    echo $this->callback_json(array(
                                        'msg' => fc_lang('验证码发送成功，请注意查收'),
                                        'code' => 1,
                                        'uid' => $data['uid'],
                                    ));exit;
                                } else {
                                    $this->member_msg(fc_lang('验证码发送成功，请注意查收'), dr_member_url('login/find', array('step' => 2, 'uid' => $data['uid'])), 1);
                                }
							} else {
								$result = $this->member_model->sendsms($value, fc_lang('尊敬的用户，您的本次验证码是：%s', $randcode));
								if ($result['status']) {
									// 发送成功
									set_cookie('find', $data['uid'], 300);
									$this->db->where('uid', (int)$data['uid'])->update('member', array('randcode' => $randcode));
                                    if (IS_API_AUTH || defined('SELECT_API_AUTH')) {
                                        echo $this->callback_json(array(
                                            'msg' => fc_lang('验证码发送成功，请注意查收'),
                                            'code' => 1,
                                            'uid' => $data['uid'],
                                        ));exit;
                                    } else {
                                        $this->member_msg(fc_lang('验证码发送成功，请注意查收'), dr_member_url('login/find', array('step' => 2, 'uid' => $data['uid'])), 1);
                                    }
								} else {
									// 发送失败
									$this->member_msg($result['msg']);
								}
							}
						} else {
							$error = $name == 'phone' ? fc_lang('该手机号码尚未注册') : fc_lang('该邮箱尚未注册');
							if (defined('SELECT_API_AUTH')) {
                                $this->member_msg($error);
                            }
						}
					}
					break;

				case 2:

					!$this->check_captcha('code2') && $this->member_msg(fc_lang('验证码不正确'));

					$uid = (int)$this->input->get('uid');
					$code = (int)$this->input->post('code');

					(!$uid || !$code) && $this->member_msg(fc_lang('输入不完整'));

					$data = $this->db
								->where('uid', $uid)
								->where('randcode', $code)
								->select('salt,uid,username,email')
								->limit(1)
								->get('member')
								->row_array();
					if (!$data) {
						$this->db->where('uid', $uid)->update('member', array('randcode' => ''));
						$this->member_msg(fc_lang('验证码不正确，请重新发送验证码'), dr_member_url('login/find'));
					}

					$password1 = $this->input->post('password');
					$password2 = $this->input->post('password2');
					if ($password1 != $password2) {
						$error = fc_lang('两次密码输入不一致');
					} elseif (!$password1) {
						$error = fc_lang('密码不能为空');
					} else {
                        if (defined('UCSSO_API')) {
                            $rt = ucsso_edit_password($data['uid'], $password1);
                            // 修改失败
                            if (!$rt['code']) {
                                $this->admin_msg(fc_lang($rt['msg']));
                            }
                        }
						// 修改密码
						$this->db->where('uid', $data['uid'])->update('member', array(
							'randcode' => 0,
							'password' => md5(md5($password1).$data['salt'].md5($password1))
						));
						$this->get_cache('MEMBER', 'setting', 'ucenter') && uc_user_edit($data['username'], '', $password1, '', 1);
						$this->hooks->call_hook('member_edit_password', array('member' => $data, 'password' => $password1));
						$this->member_msg(fc_lang('密码修改成功'), dr_member_url('login/index'), 1);
					}
                    if (defined('SELECT_API_AUTH')) {
                        $this->member_msg($error);exit;
                    }
					break;
			}
		}

		$this->template->assign(array(
			'step' => $step,
			'error' => $error,
			'action' => 'find',
			'mobile' => $this->get_cache('member', 'setting','ismobile'),
			'meta_title' => fc_lang('找回密码通知'),
			'result_error' => $error,
		));
		$this->template->display('find.html');
	}

	/**
	 * 审核会员
	 */
	public function verify() {

		(!isset($_SERVER['HTTP_USER_AGENT']) || strlen($_SERVER['HTTP_USER_AGENT']) < 20 ) 
		&& $this->member_msg(fc_lang('认证失败'));

		$data = $this->member_model->get_decode($this->input->get('code'));
		!$data && $this->member_msg(fc_lang('此链接不符合规范'));

		list($time, $uid, $code) = explode(',', $data);
		
		!$this->db->where('uid', $uid)->where('randcode', $code)->count_all_results('member') 
		&& $this->member_msg(fc_lang('此链接已经不存在'));

		$this->db->where('uid', $uid)->where('groupid<>', 3)->update('member', array('randcode' => 0, 'groupid' => 3));

		$this->member_msg(fc_lang('恭喜你~会员验证成功，请返回登录'), dr_member_url('login/index'), 1);
	}

	/**
	 * 重发邮件审核
	 */
	public function resend() {

		$this->member['groupid'] != 1 && $this->member_msg(fc_lang('你已经通过审核了，无需发送邮件审核'));
		$this->get_cache('MEMBER', 'setting', 'regverify') != 1 && $this->member_msg(fc_lang('系统尚未开启邮件审核功能'));
		get_cookie('resend') && $this->member['randcode'] && $this->member_msg(fc_lang('邮件已经发送过了，请注意查收'));
		
		$url = SITE_URL.'index.php?s=member&c=login&m=verify&code='.$this->member_model->get_encode($this->uid);
		$this->sendmail(
			$this->member['email'],
			fc_lang('会员注册-邮件验证'),
			fc_lang(@file_get_contents(WEBPATH.'cache/email/verify.html'), $this->member['username'], $url, $url, $this->input->ip_address())
		);

		$this->input->set_cookie('resend', $this->uid, 3600);
		$this->member_msg(fc_lang('邮件（%s）发送成功，请注意查收', $this->member['email']), dr_member_url('home/index'), 1);
	}



	/**
	 * 审核时短信认证验证码发送
	 */
	public function sendsms() {

		// 重复发送
		get_cookie('send_sms_verify') && exit(dr_json(0, fc_lang('验证码已发送，请在2分钟之后再试')));

		// 是否已经通过
		$this->member['groupid'] > 1 && exit(dr_json(0, fc_lang('验证码已发送，请在2分钟之后再试')));

		$code = dr_randcode();
		$result = $this->member_model->sendsms($this->member['phone'], fc_lang('尊敬的用户，您的本次验证码是：%s', $code));
		if ($result['status']) {
			// 发送成功
			$this->db->where('uid', $this->uid)->update('member', array('randcode' => $code));
			set_cookie('send_sms_verify', 1, 120);
			exit(dr_json(1, fc_lang('验证码发送成功，请注意查收')));
		} else {
			// 发送失败
			exit(dr_json(0, $result['msg']));
		}
	}

	/**
	 * 短信审核处理
	 */
	public function verify_sms() {

		// 是否已经通过
		$this->member['groupid'] > 1 && exit(dr_json(0, fc_lang('验证码已发送，请在2分钟之后再试')));

		$this->member['randcode'] != intval($_POST['randcode']) && exit(dr_json(0, fc_lang('短信验证码不正确')));

		$this->db->where('uid', $this->uid)->where('groupid<>', 3)->update('member', array('randcode' => 0, 'groupid' => 3));

		exit(dr_json(1, 'ok'));
	}

	/**
	 * 退出
	 */
	public function out() {
	    $url = $this->security->xss_clean(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : SITE_URL);
		if (IS_AJAX) {
			exit(json_encode(array(
				'backurl' => $url,
				'syncurl' => dr_member_sync_url($this->member_model->logout()))));
		} else {
			$this->template->assign('member', '');
			$this->member_msg(fc_lang('您已经成功退出了').$this->member_model->logout(), $url, 1, 3);
		}
	}

}
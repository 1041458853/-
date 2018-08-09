<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * v3.2
 */
class Weixin_model extends CI_Model {

    public $prefix;
    private $wx;

    /**
     * 微信模型类
     */
    public function __construct() {
        parent::__construct();
        $this->prefix = SITE_ID.'_weixin';
        $this->wx = $this->cache(SITE_ID);
    }

    // 初始化用户情况
    public function _init_user($openid, $event_key = null)
    {
		$user = $this->weixin_model->get_user_info($openid);
		if (!$user) {
			// 入库粉丝表
			$user = json_decode(@dr_catcher_data('https://api.weixin.qq.com/cgi-bin/user/info?access_token='.dr_get_access_token()
			    .'&openid='.$openid), true);
		    // 判断是否关注公众号
		    if ($user['subscribe'] && empty($rs['errcode'])) {
    			$user['id'] = $this->weixin_model->add_user($user);
    			$user['uid'] = 0; // 加入粉丝表中
		    } else {
		        $this->template->display('subscribe.html');
		        die;
		    }
		}
		// 当用户没有绑定会员的情况时
		if (!$user['uid']) {
			// 先判断这个微信是否使用过快捷登录
			$oauth = $this->db->where('oauth', 'weixin')->where('oid', $user['openid'])->get('member_oauth')->row_array();
			if (!$oauth) {
		        if ($this->wx['config']['user_type']) {
					// 将微信号自动注册本站会员
					$user['uid'] = $this->member_model->_register(array(
						'nickname' => preg_replace('/[\x{10000}-\x{10FFFF}]/u', '', $user['nickname']), // 处理昵称字符
						'avatar' => $user['headimgurl'],
						'inviter' => (int)$event_key['inviter']
					), 'weixin');
					@$this->cache->file->save('inviter_test', $this->db->last_query(), 1000);
					$this->db->where('id', $user['id'])->update($this->weixin_model->prefix.'_user', array(
						'uid' => $user['uid'],
					));/*
		            @$this->cache->file->save('eve_data_test', $event_key, 1000);
					@$this->cache->file->save('eve_test', $event_key['inviter'], 1000);
					if (@!empty($event_key['inviter'])) {
					    @$this->db->where('uid', $user['id'])->update('member', []);
					}*/
				} elseif ($this->wx['config']['is_tuser']) {
					// 提醒用户绑定会员
					$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->wx['config']['key'].'&redirect_uri='.urlencode(SITE_URL.'index.php?c=weixin&m=member').'&response_type=code&scope=snsapi_base&state=member#wechat_redirect';
					$txt = $this->wx['config']['txt_tuser'] ? $this->wx['config']['txt_tuser'] : '您好，您还没有绑定会员呢，点我赶紧绑定吧';
					$this->replyText('<a href="'.$url.'">'.$txt.'</a>');
					return false;
				}
			} else {
				$user = $oauth;
			}
		}

		// 存储cookie
		$this->uid = $user['uid'];
		$this->member = $this->member_model->get_member($this->uid);
		$this->db->where('id', $user['id'])->update($this->weixin_model->prefix.'_user', array(
			'uid' => $this->member['uid'],
			'username' => $this->member['username'],
		));
		$this->input->set_cookie('weixin_uid', $this->member['uid'], 86400);
		$this->input->set_cookie('member_uid', $this->member['uid'], 86400);
		$this->input->set_cookie('member_cookie', substr(md5(SYS_KEY.$this->member['password']), 5, 20), 86400);

		return $this->uid;
    }

    // 粉丝入库
    public function add_user($data) {

        $data['nickname'] = trim($data['nickname'], '"');
        $user = $this->db->where('openid', $data['openid'])->get($this->prefix.'_user')->row_array();
        if ($user) {
            $this->db->where('id', $user['id'])->update($this->prefix.'_user', array(
                'groupid' => (int)$data['groupid'],
                'openid' => $data['openid'],
                'nickname' => dr_deal_emoji($data['nickname'], 0),
                'sex' => $data['sex'],
                'city' => $data['city'],
                'country' => $data['country'],
                'province' => $data['province'],
                'language' => $data['language'],
                'headimgurl' => $data['headimgurl'],
                'subscribe_time' => $data['subscribe_time'],
            ));
            return $user['id'];
        } else {
            $this->db->insert($this->prefix.'_user', array(
                'uid' => 0,
                'username' => '',
                'groupid' => (int)$data['groupid'],
                'openid' => $data['openid'],
                'nickname' => dr_deal_emoji($data['nickname'], 0),
                'sex' => $data['sex'],
                'city' => $data['city'],
                'country' => $data['country'],
                'province' => $data['province'],
                'language' => $data['language'],
                'headimgurl' => $data['headimgurl'],
                'subscribe_time' => $data['subscribe_time'],
            ));
            return $this->db->insert_id();
        }
    }

    // 获取带参数二维码
    public function get_qrcode($data, $time = 2592000)
    {
        if (is_array($data) || is_object($data)) {
            $data = http_build_query($data);
        }
        if (is_string($data)) {
            $post = ['expire_seconds' => (int)$time, 'action_name' => 'QR_STR_SCENE', 'action_info' => ['scene' => ['scene_str' => $data]]];
        } else {
            $post = ['expire_seconds' => (int)$time, 'action_name' => 'QR_SCENE', 'action_info' => ['scene' => ['scene_id' => $data]]];
        }
        $url = 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=' . dr_get_access_token();
        $result = dr_post_data($url, $post);
        if (!empty($result['ticket'])) {
            return $result;
        } else {
            return false;
        }
    }

    // 更新粉丝
    public function edit_user($id, $data) {
        $data['nickname'] = trim($data['nickname'], '"');
        $user = $this->db->where('id', $id)->get($this->prefix.'_user')->row_array();
        if ($user) {
            $this->db->where('id', $user['id'])->update($this->prefix.'_user', array(
                'groupid' => (int)$data['groupid'],
                'openid' => $data['openid'],
                'nickname' => dr_deal_emoji($data['nickname'], 0),
                'sex' => $data['sex'],
                'city' => $data['city'],
                'country' => $data['country'],
                'province' => $data['province'],
                'language' => $data['language'],
                'headimgurl' => $data['headimgurl'],
                'subscribe_time' => $data['subscribe_time'],
            ));
            return $user['id'];
        } else {
            $this->db->insert($this->prefix.'_user', array(
                'uid' => 0,
                'username' => '',
                'groupid' => (int)$data['groupid'],
                'openid' => $data['openid'],
                'nickname' => dr_deal_emoji($data['nickname'], 0),
                'sex' => $data['sex'],
                'city' => $data['city'],
                'country' => $data['country'],
                'province' => $data['province'],
                'language' => $data['language'],
                'headimgurl' => $data['headimgurl'],
                'subscribe_time' => $data['subscribe_time'],
            ));
            return $this->db->insert_id();
        }
    }

    // 获取粉丝详情
    public function get_user_info($openid) {

        $user = $this->db->where('openid', $openid)->get($this->prefix.'_user')->row_array();
        if ($user) {
            $user['nickname'] = dr_deal_emoji($user['nickname'], 1);
        }
        return $user;
    }

    // 获取粉丝组
    public function get_group() {

        $data = $this->db->where('wechat_id>=0')->get($this->prefix.'_group')->result_array();
        if ($data) {
            $group = array();
            foreach ($data as $t) {
                $group[$t['wechat_id']] = $t;
            }
            return $group;
        }
    }


    // 配置类
    public function config($name, $set = array()) {

        $data = $this->db->where('name', $name)->get($this->prefix)->row_array();
        $data = dr_string2array($data['value']);

        // 修改数据
        if ($set) {
            $this->db->replace($this->prefix, array('name' => $name, 'value' => dr_array2string($set)));
            $data = $set;
        }

        return $data;
    }

    /*
	 * 回复图文消息 传出图文素材的ID
	 */
    public function reply_news($openid, $sucai_id) {

        $data = $this->db
                     ->where('group_id', $sucai_id)
                     ->get($this->prefix.'_material_news')
                     ->result_array();
        $articles = array();
        foreach ( $data as $vo ) {
            // 文章内容
            $art ['title'] = $vo ['title'];
            $art ['description'] = $vo ['description'];
            if (empty ( $vo ['linkurl'] )) {
                $art ['url'] = dr_weixin_show_url($vo['id']);
            } else {
                $art ['url'] = $vo ['linkurl'];
            }
            // 获取封面图片URL
            $art ['picurl'] = dr_get_file( $vo ['thumb'] );
            $articles [] = $art;
        }

        $param ['news'] ['articles'] = $articles;

        return $this->_replyData($openid, $param, 'news');
    }

    /* 回复文本消息 */
    public function reply_text($openid, $content) {
        $param['text']['content'] = $content;
        return $this->_replyData($openid, $param, 'text' );
    }

    /* 回复图片消息 */
    public function reply_image($openid, $media_id, $type = 'file') {
        $type == 'file' && $media_id = $this->get_image_media_id ( $media_id );
        //素材图片id
        if ($type =='material_image'){
            $imageMaterial = $this->db->where('id', $media_id)->get($this->prefix.'_material_image')->row_array();
            if ($imageMaterial['media_id']){
                $media_id = $imageMaterial['media_id'];
            }else{
                $media_id= $this->get_image_media_id($media_id);
            }
        }
        $param ['image'] ['media_id'] = $media_id;

        return $this->_replyData( $openid, $param, 'image');
    }

    /* 回复语音消息 */
    /**
     *
     * @param unknown $uid
     * @param unknown $media_id: id值
     * @param string $type 决定id值的类型： material_file：文件素材的id, file_id:文件id  '':media_id
     * @return Ambigous <number, string>
     */
    public function reply_voice($uid,$media_id,$type='file_id') {
        $type == 'file_id' && $media_id = $this->get_file_media_id( $media_id,'voice' );
        if ($type =='material_file'){
            $fileMaterial = $this->db->where('id', $media_id)->get($this->prefix.'_material_file')->row_array();
            if ($fileMaterial['media_id']){
                $media_id=$fileMaterial['media_id'];
            }else{
                $media_id=$this->get_file_media_id($fileMaterial['file'],'voice');
            }
        }
        $msg ['voice'] ['media_id'] = $media_id;
        return $this->_replyData ($uid, $msg, 'voice' );
    }
    /* 回复视频消息 */
    public function reply_video($uid,$media_id, $type='file_id',$thumb='',$title = '', $description = '') {
        $type == 'file_id' && $media_id = $this->get_file_media_id( $media_id,'video' );
        if ($type =='material_file'){
            $fileMaterial = $this->db->where('id', $media_id)->get($this->prefix.'_material_file')->row_array();
            empty($title)&&$title=$fileMaterial['title'];
            empty($description) && $description=$fileMaterial['introduction'];
            if ($fileMaterial['media_id']){
                $media_id=$fileMaterial['media_id'];
            }else{
                $media_id=$this->get_image_media_id($fileMaterial['file'],'video');
            }
        }
        $msg ['video'] ['media_id'] = $media_id;
        $msg ['video'] ['thumb_media_id'] =$thumb?$thumb:$this->get_thumb_media_id(); //缩略图
        $msg ['video'] ['title'] = $title;
        $msg ['video'] ['description'] = $description;
        return $this->_replyData ($uid, $msg, 'video' );
    }
    /* 回复音乐消息  */
    public function reply_music($uid,$media_id, $title = '', $description = '', $music_url, $HQ_music_url) {
        $msg ['Music'] ['ThumbMediaId'] = $media_id;
        $msg ['Music'] ['Title'] = $title;
        $msg ['Music'] ['Description'] = $description;
        $msg ['Music'] ['MusicURL'] = $music_url;
        $msg ['Music'] ['HQMusicUrl'] = $HQ_music_url;
        return $this->_replyData ( $uid,$msg, 'music' );
    }


    /* 发送回复消息到微信平台 */
    function _replyData($openid, $param, $msg_type) {


        $param ['touser'] = $openid;
        $param ['msgtype'] = $msg_type;

        $url = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=' . dr_get_access_token ();

        $result ['status'] = 0;
        $res = dr_post_data($url, $param );
        if ($res ['errcode'] != 0) {
             $result ['msg'] = dr_error_msg($res);
        } else {
            $data = array();
            $data ['ToUserName'] = dr_weixin_get_token ();
            $data ['FromUserName'] = $param ['touser'];
            $data ['CreateTime'] = SYS_TIME;
            $data ['Content'] = isset ( $param ['text'] ['content'] ) ? $param ['text'] ['content'] : json_encode ( $param );
            $data ['MsgId'] = $this->uid; // 该字段保存管理员ID
            $data ['type'] = 1;
            $data ['is_read'] = 1;
           # $this->db->insert($this->prefix.'_message', $data );
            $result ['status'] = 1;
            $result ['msg'] = '回复成功';
        }
        return $result;
    }

    // 新增临时图片素材
    function get_image_media_id($cover_id) {

        $cover = dr_get_file($cover_id);
        // 先把图片下载到本地
        $content = dr_catcher_data($cover);
        $file = WEBPATH.'cache/attach/'.md5($cover).'.'.trim('.', substr(strrchr($cover, '.'), 1));
        $res = file_put_contents($file, $content);
        if (!$res) {
            return 0;
        }

        $param ['type'] = 'image';
        $param ['media'] = '@' . $file;
        $url = 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token=' . dr_get_access_token ();
        $res = dr_post_data ( $url, $param, true );
        @unlink($file);
        if (isset ( $res ['errcode'] ) && $res ['errcode'] != 0) {
            return 0;
        }
        return $res['media_id'];
    }

    // 新增临时 voice 语音/ video 视频素材
    function get_file_media_id($file_id,$type='voice') {
        $fileInfo = get_attachment($file_id);
        if ($fileInfo){
            // 远程图片下载到本地缓存目录
            if (isset($info['remote']) && $info['remote']) {
                $file = WEBPATH.'cache/attach/'.time().'_'.basename($info['attachment']);
                file_put_contents($file, dr_catcher_data($info['attachment']));
            } else {
                $file = SYS_UPLOAD_PATH.'/'.$info['attachment'];
            }
            if (!is_file($file)) {
                return 0;
            }
            $param ['type'] = $type;
            $param ['media'] = '@' . $file;
            $url = 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token=' . dr_get_access_token ();
            $res = dr_post_data ( $url, $param, true );
            if (isset ( $res ['errcode'] ) && $res ['errcode'] != 0) {
                return 0;
            }
        }else {
            return 0;
        }

        return $res ['media_id'];
    }

    // 临时缩略图素材
    function get_thumb_media_id($path='') {

        if (!$path){
            $path = WEBPATH.'statics/admin/images/nopic.gif';
        }
        $param ['type'] = 'thumb';
        $param ['media'] = '@' . $path;
        $url = 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token=' . dr_get_access_token ();
        $res = dr_post_data ( $url, $param, true );
        if (isset ( $res ['errcode'] ) && $res ['errcode'] != 0) {
            return 0;
        }
        return $res ['thumb_media_id'];
    }


    // 按用户组发送
    function send_by_group($groupid) {

        $url = 'https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=' . dr_get_access_token ();

        $paramStr = '';
        if ($groupid) {
            // $param ['filter'] ['is_to_all'] = "false";
            // $param ['filter'] ['group_id'] = $groupid;
            $paramStr .= '{"filter":{"is_to_all":false,"group_id":"' . $groupid . '"},';
        } else {
            // $param ['filter'] ['is_to_all'] = "true";
            $paramStr.= '{"filter":{"is_to_all":true},';
        }
        $info = $this->_sucai_media_info ();

        if ($info ['msgtype'] == 'text') {
            // $param ['text'] ['content'] = $info ['media_id'];
            $paramStr .= '"text":{"content":"' . $info ['media_id'] . '"},"msgtype":"text"}';
        } else if ($info ['msgtype'] == 'mpnews') {
            // $param ['mpnews'] ['media_id'] = $info ['media_id'];
            $paramStr .= '"mpnews":{"media_id":"' . $info ['media_id'] . '"},"msgtype":"mpnews"}';
        } else if ($info ['msgtype'] == 'voice') {
            // $param ['mpnews'] ['media_id'] = $info ['media_id'];
            $paramStr .= '"voice":{"media_id":"' . $info ['media_id'] . '"},"msgtype":"voice"}';
        } else if ($info ['msgtype'] == 'mpvideo') {
            // $param ['mpnews'] ['media_id'] = $info ['media_id'];
            $paramStr .= '"mpvideo":{"media_id":"' . $info ['media_id'] . '"},"msgtype":"mpvideo"}';
        }
        // $param ['msgtype'] = $info ['msgtype'];
        // $param ['msgtype'] = 'news';
        // dump($paramStr);

        $res = dr_post_data ( $url, $paramStr );

        if ($res ['errcode'] != 0) {
            $this->admin_msg ( dr_error_msg ( $res ) );
        } else {
            return $res ['msg_id'];
        }
    }
    // 按用户组发送 订阅号不可用，服务号认证后可用
    function send_by_openid($openids) {
        if (empty ( $openids )) {
            $this->ci->admin_msg ( '要发送的OpenID值不能为空' );
        }
        if (count ( $openids ) < 2) {
            $this->ci->admin_msg ( 'OpenID至少需要2个或者2个以上' );
        }

        $url = 'https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token=' . dr_get_access_token ();

        $info = $this->_sucai_media_info ();

        $param ['touser'] = $openids;
        if ($info ['msgtype'] == 'text') {
            $param ['text'] ['content'] = $info ['media_id'];
            $param ['msgtype'] = $info ['msgtype'];
        } else if ($info ['msgtype'] == 'mpnews') {
            $param ['mpnews'] ['media_id'] = $info ['media_id'];
            $param ['msgtype'] = $info ['msgtype'];
        } else if ($info ['msgtype'] == 'voice') {
            $param ['voice'] ['media_id'] = $info ['media_id'];
            $param ['msgtype'] = $info ['msgtype'];
        } else if ($info ['msgtype'] == 'mpvideo') {
            $param ['video'] ['media_id'] = $info ['media_id'];
            $param ['msgtype'] = $info ['video'];
        }

        $param = JSON ( $param );
        $res = dr_post_data ( $url, $param );
        if ($res ['errcode'] != 0) {
            $this->ci->admin_msg ( dr_error_msg ( $res ) );
        } else {
            return $res ['msg_id'];
        }
    }

    // 获取素材的media_id
    function _sucai_media_info() {

        $type = $_POST ['msg_type'];
        $appmsg_id = (int)$_POST ['sc'];

        if ($type == 'text') {
            if ($appmsg_id) {
                $text = $this->db->where('id', $appmsg_id)->get($this->prefix.'_material_text')->row_array();
                $content = $text['content'];
            }
            if (!$content) {
                $content = $_POST['content'];
            }
            if (empty ( $content )) {
                $this->ci->admin_msg ( '文本内容不能为空' );
            }
            $res ['media_id'] = $content;
            $res ['msgtype'] = 'text';
        } else if ($type == 'appmsg' || $type == 'news') {
            if (empty ( $appmsg_id )) {
                $this->ci->admin_msg ( '图文素材不能为空' );
            }
            $data = $this->db->where('id', $appmsg_id)->get($this->prefix.'_material_news')->row_array();
            if (empty ( $data )) {
                $this->ci->admin_msg ( '图文素材查询结果不存在' );
            }
            $res ['media_id'] = $data['media_id'];
            $res ['msgtype'] = 'mpnews';
        } else if ($type == 'voice') {
            $voice = $appmsg_id;
            if (empty ( $voice )) {
                $this->ci->admin_msg ( '语音素材不能为空' );
            }
            $data = $this->db->where('id', $appmsg_id)->get($this->prefix.'_material_file')->row_array();
            if (empty ( $data )) {
                $this->admin_msg ( '语音素材查询结果不存在' );
            }
            if ($data ['media_id']) {
                $res ['media_id'] = $data ['media_id'];
            } else {
                $res ['media_id'] = $this->get_file_media_id ( $data ['file'], 'voice' );
            }
            $res ['msgtype'] = 'voice';
        } else if ($type == 'video') {
            $video = $appmsg_id;
            if (empty ( $video )) {
                $this->ci->admin_msg ( '视频素材不能为空' );
            }
            $file = $this->db->where('id', $appmsg_id)->get($this->prefix.'_material_file')->row_array();
            if (empty ( $file )) {
                $this->ci->admin_msg ( '视频素材查询结果不存在' );
            }
            if ($file ['media_id']) {
                $mediaId = $file ['media_id'];
            } else {
                $mediaId = $this->get_file_media_id ( $file ['file'], 'video' );
            }
            $data ['media_id'] = $mediaId;
            $data ['title'] = $file ['title'];
            $data ['description'] = $file ['description'];
            $url1 = "https://file.api.weixin.qq.com/cgi-bin/media/uploadvideo?access_token=" . dr_get_access_token();
            $result = dr_post_data ( $url1, $data );
            $res ['media_id'] = $result ['media_id'];
            $res ['msgtype'] = 'mpvideo';
        }
        return $res;
    }


    // 缓存类
    public function cache($siteid = SITE_ID) {

        // 微信表
        if (!$this->db->table_exists($this->db->dbprefix($siteid.'_weixin'))) {
            if (!is_file(WEBPATH.'cache/install/weixin.sql')) {
                return array();
            }
            $sql = file_get_contents(WEBPATH.'cache/install/weixin.sql');
            $this->ci->sql_query(str_replace('{dbprefix}', $this->db->dbprefix($siteid.'_'), $sql));
        }

        $cache = array();
        $query = $this->db->get($siteid.'_weixin');
        $data = $query ? $query->result_array() : array();
        if ($data) {
            foreach ($data as $t) {
                $cache[$t['name']] = dr_string2array($t['value']);
            }
        }

        $this->dcache->set('weixin-'.$siteid, $cache);
        @unlink(WEBPATH.'cache/data/access_token.'.$siteid);

        return $cache;
    }

} 
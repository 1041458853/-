<?php
/* Created by mtdev Chaixiha@mutaoinc.com */
if (!defined('BASEPATH')) exit('No direct script access allowed');

function exit_print_r($e){
    print_r($e); exit;
}

function exit_echo($e){
    echo($e); exit;
}

function echo_br($e){
    echo($e.'<br />');
}

function exit_json($code, $data, $msg=''){
    exit_echo(json_encode(array('code'=>$code, 'data'=>$data, $msg=>$msg)));
}
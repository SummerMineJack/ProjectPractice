<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/9
 * Time: 10:08
 */
//开启会话
session_start();
//清空会话
$_SESSION = [];
//删除会话cookie
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 1, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
session_destroy();
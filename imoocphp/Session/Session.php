<?php
/**
 * Created by PhpStorm.
 * User: Summer
 * Date: 2019/5/8
 * Time: 21:01
 */
session_start();
$userlis = ['user1' => ['username' => 'huangjian123', 'userage' => 24, 'useremail' => 'hjzxzone@163.com'], 'user2' => ['username' => 'huangjian1', 'userage' => 25, 'useremail' => '358289258@qq.com']];
$_SESSION = $userlis;
//使用cookie设置session过期时间
//如果用户禁用Cookie将会失去会话状态
setcookie(session_name(), session_id(), time() + 24 * 3600);
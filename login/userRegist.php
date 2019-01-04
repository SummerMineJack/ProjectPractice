<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/27
 * Time: 13:44
 */
require_once "MysqlConntect.php";
$mysql = new mysqlConntect();
$mysql->conntct();

$username = $_POST['UserName'];
$userPwd = $_POST['UserPassword'];
$conformUserPwd = $_POST['ConformUserPassword'];
$data = array("username" => $username, "userpwd" => $userPwd);
print_r($data);
$reslutid = $mysql->insertValue("userinfo", $data);
if ($reslutid != 0) {
    echo "注册成功";
    header("Location:userLogin.html?" . $username);
} else {
    echo "注册失败" . $reslutid;
}
<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/27
 * Time: 13:44
 */
require_once "MysqlConntect.php";
$username = $_POST['UserName'];
$userPwd = $_POST['UserPassword'];
$conformUserPwd = $_POST['ConformUserPassword'];
$conntct = mysqlConntect::getInstance();
$sql = "insert into userinfo (0,'{$username}','{$userPwd}') ";
$result = $conntct->sel4Sql($sql);
if (mysqli_num_rows($result)) {
    echo "注册成功";
    header("Location:userLogin.html?" . $username);
} else {
    echo "注册失败" . $result;
}
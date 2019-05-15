<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/27
 * Time: 13:45
 */
require_once "MysqlConntect.php";
$loginUserName = $_POST['username'];
$loginUserPwd = $_POST['userpwd'];
$connect = mysqlConntect::getInstance();
$sql = "select * from userinfo where username='{$loginUserName}' and userpassword='{$loginUserPwd}'";
$result = $connect->sel4Sql($sql);
if (mysqli_num_rows($result)) {
    setcookie("user", $loginUserName);
}
if (isset($_COOKIE["user"]))
    echo "欢迎 " . $_COOKIE["user"] . "!<br>";
else
    header("Location:userLogin.html");
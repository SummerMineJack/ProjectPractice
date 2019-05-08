<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/27
 * Time: 13:45
 */
require_once "../../login/MysqlConntect.php";
$mysql = new mysqlConntect();
$mysql->conntct();


$loginUserName = $_POST['username'];
$loginUserPwd = $_POST['userpwd'];
$result = $mysql->selValue("userinfo", $loginUserName, $loginUserPwd);
if (mysqli_num_rows($result)) {
    setcookie("user", $loginUserName);
}
if (isset($_COOKIE["user"]))
    echo "欢迎 " . $_COOKIE["user"] . "!<br>";
else
    header("Location:userLogin.html");
<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/17
 * Time: 15:26
 */
require_once "../../login/MysqlConntect.php";
/*$userName = isset($_POST['username']) ? $_POST['username'] : "";
$userPassword = isset($_POST['password']) ? $_POST['password'] : "";
if (empty($userName) || empty($userPassword) || !preg_match("/^[a-zA-Z0-9]{6,}$/", $userName)) {
    die("you input userName and password not valid!");
}*/
$conn=mysqlConntect::getInstance();
$link=$conn->getMysqli();
//$sql = "select * from userinfo where username='" . mysqli_real_escape_string($link,$userName) . "' and userpassword='" . $userPassword . "'";
$sql = "select * from userinfo";

//使用sql预编译的形式防止sql注入
/*$sql1="select * from userinfo where  username=? and userpassword=?";
$stmt=$link->prepare($sql1);
$stmt->bind_param("ss",$userName,$userPassword);*/
//使用sql预编译的形式防止sql注入

$result=$conn->sel4Sql($sql);
print_r(mysqli_fetch_assoc($result));
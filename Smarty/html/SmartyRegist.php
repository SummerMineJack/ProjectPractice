<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/27
 * Time: 13:44
 */
require "../../login/MysqlConntect.php";
require "./libs/Smarty.class.php";
$Smarty = new Smarty();
$mysql = new mysqlConntect();
$mysql->conntct();

$username = $_POST['usernamesignup'];
$useremail = $_POST['emailsignup'];
$userPwd = $_POST['passwordsignup'];
$conformUserPwd = $_POST['passwordsignup_confirm'];
$data = array("username" => $username, "userpassword" => $userPwd, "useremail" => $useremail);
$result= $mysql->insertValue("userinfo", $data);
if (mysqli_num_rows($result)) {
    echo "注册成功";
    $Smarty->assign("username", $username);
    $Smarty->display("../html/login.html");
} else {
    echo "注册失败" . $result;
}
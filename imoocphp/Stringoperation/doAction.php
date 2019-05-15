<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/15
 * Time: 9:59
 */
$username = $_POST['username'];
$userpassword = $_POST['userpassword'];
$userpassword1 = $_POST['userpassword1'];
$useremail = $_POST['useremail'];
$fcun = $_POST[''];
$verifycode = $_POST['verifycode'];
$verifycode1 = $_POST['verifycode1'];

$redrictUrl = "<a href='regigst.php'>重新注册</a>";
//获取首字母
$char = $username{0};
//获取首字母的ASCII码
$ascii = ord($char);
if (!(($ascii >= 65 && $ascii <= 90) || ($ascii >= 97 && $ascii <= 122))) {
    exit("用户名首字母不是字母<br/> {$redrictUrl}");
}
$usernameLen = strlen($username);
if ($usernameLen < 6 || $usernameLen > 10) {
    exit("用户名长度不符合规范<br/> {$redrictUrl}");
}
$passwordLeng = strlen($userpassword);
if ($passwordLeng == 0) {
    exit("密码不能为空<br/> {$redrictUrl}");
}
if ($passwordLeng < 6 || $passwordLeng > 10) {
    exit("密码长度不符合规范<br/> {$redrictUrl}");
}
if ($userpassword !== $userpassword1) {
    exit("两次密码不一致<br/> {$redrictUrl}");
}
if (strpos($useremail, "@") == false) {
    exit("邮箱不符合规范<br/> {$redrictUrl}");
}
if ($verifycode !== $verifycode1) {
    exit("验证码错误<br/> {$redrictUrl}");

}

echo "继续";

<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/8
 * Time: 14:58
 */
require "../../login/MysqlConntect.php";
$username = $_POST['username'];
$password = md5($_POST['userpwd']);
$connt = mysqlConntect::getInstance();
$sql = "select * from userinfo where username='{$username}' and userpassword='{$password}'";
$result = $connt->sel4Sql($sql);
if (mysqli_num_rows($result)) {
    if ($authLogin == 1) {
        $row = mysqli_fetch_assoc($result);
        setcookie("username", $username, strtotime("+7 days"));
        $token = "ceshi";
        $auth = md5($username . $password . $token) . ":" . $row["id"];
        setcookie('auth', $auth, strtotime("+7 days"));
    } else {
        setcookie("username", $username);
    }
    exit("<script>
            alert('登录成功');
            location.href='index.php';
</script>");
} else {
    exit("<script>
        alert('登录失败');
        location.href='login.php';
</script>");
}
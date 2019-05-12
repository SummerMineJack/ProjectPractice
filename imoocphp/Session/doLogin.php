<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/8
 * Time: 14:58
 */
session_start();
require "../../login/MysqlConntect.php";
$connt = mysqlConntect::getInstance();
$connt->conntct();
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['userpwd']) ? md5($_POST['userpwd']) : "";
$verifyCode = isset($_POST['verify']) ? trim(strtolower($_POST['verify'])) : "";
$sessionVerify = trim(strtolower($_SESSION['verifycode']));
$act = $_GET['act'];
$sql = "select * from userinfo where username='$username' and userpassword='$password'";
$result = $connt->sel4Sql($sql);
switch ($act) {
    case 'login':
        if ($verifyCode !== $sessionVerify) {
            exit("<script>alert('验证码错误，请重新登录');location.href='login.php'</script>");
        }
        if (mysqli_num_rows($result)) {
            $_SESSION['username'] = mysqli_fetch_assoc($result)['username'];
            $_SESSION['isLogin'] = 1;
            exit("<script>alert('登录成功');location.href='index.php'</script>");
        } else {
            exit("<script>alert('登录失败');location.href='login.php'</script>");
        }
        break;
    case 'logout':
        $_SESSION = [];
        //删除会话cookie
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 1, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        }
        session_destroy();
        exit("<script>alert('退出成功');location.href='login.php'</script>");
        break;
}
?>

<?php
session_start();
print_r($_SESSION);
require '../login/MysqlConntect.php';
$connect = new mysqlConntect();
$connect->conntct();
if (!isset($_COOKIE['username'])) {
    exit('<script>alert("请先登录");location.href="login.php";</script>');
}
if (isset($_COOKIE['auth'])) {
    $auth = $_COOKIE['auth'];
    $resArr = explode(':', $auth);
    $userId = end($resArr);
    $sql = "select id ,username,userpassword from userinfo where id=$userId";
    $result = $connect->sel4sql($sql);
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $password = $row['userpassword'];
        $token = "ceshi";
        $authStr = md5($username . $password . $token);
        if ($authStr != $resArr[0]) {
            exit('<script>alert("请先登录");location.href="login.php";</script>');
        }
    } else {
        exit('<script>alert("请先登录");location.href="login.php";</script>');
    }
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>默认首页</title>
</head>
<body>
<h1>这是登录后的首页页面 欢迎你<?php echo $_COOKIE['username']; ?></h1>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['isLogin']) || isset($_SESSION['isLogin']) != 1 || !isset($_SESSION['username'])) {
    exit('<script>alert("请先登录");location.href="login.php";</script>');
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
<h1>这是登录后的首页页面 欢迎你<?php echo $_SESSION['username']; ?></h1>
<a href="userCenter.php">个人中心</a>
</body>
</html>
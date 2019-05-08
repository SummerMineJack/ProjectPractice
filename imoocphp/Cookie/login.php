<?php
    session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="doLogin.php" method="post">
    <input type="text" name="username" placeholder="用户名"><br>
    <input type="password" name="userpwd" placeholder="密  码"><br>
    <input type="checkbox" value="1" name="authLogin">一周内自动登录
    <input type="submit" value="提交">
</form>
</body>
</html>

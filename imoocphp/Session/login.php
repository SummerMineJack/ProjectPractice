<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="doLogin.php?act=login" method="post">
    <label>用户名</label>
    <input type="text" name="username" placeholder="用户名"><br>
    <label>密&nbsp&nbsp&nbsp码</label>
    <input type="password" name="userpwd" placeholder="密  码"><br>
    <label>验证码</label>
    <input type="text" name="verify"><br>
    <img src="code.php"><br>
    <input type="submit" value="提交">
</form>

</body>
</html>

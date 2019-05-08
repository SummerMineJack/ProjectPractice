<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/26
 * Time: 13:49
 */
$exprit = time() + 10;
setcookie("user", "HuangJian", $exprit, "/", "www.huangjian.com", true, true);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHPCookies</title>
</head>
<body>
<?php
if (isset($_COOKIE["user"]))
    echo "欢迎 " . $_COOKIE["user"] . "!<br>";
else
    echo "普通访客!<br>";
?>
</body>
</html>


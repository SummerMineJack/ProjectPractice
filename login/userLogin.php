<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/27
 * Time: 13:45
 */
require_once "MysqlConntect.php";
$mysql = new mysqlConntect();
$mysql->conntct();


$loginUserName = $_POST['username'];
$loginUserPwd = $_POST['userpwd'];
$resultid = $mysql->selValue("userinfo", $loginUserName, $loginUserPwd);
echo $resultid;
if ($resultid != 0) {
    echo "登录成功";
    setcookie("user", $loginUserName);
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
    欢迎你:<?php $_COOKIE['user'] ?>
    </body>
    </html>

    <?php
} else {
    echo $resultid;
} ?>
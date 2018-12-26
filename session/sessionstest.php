<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/26
 * Time: 13:52
 */
session_status();
if (isset($_SESSION['view'])) {
    $_SESSION['view'] = $_SESSION['view'] + 1;
} else {
    $_SESSION['view'] = 1;
    //使用unset或者session_destory()进行销毁session
//    unset($_SESSION['view']);
//    session_destroy();
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Session</title>
</head>
<body>
<?php
echo "浏览量：" . $_SESSION['view'];
?>
</body>
</html>

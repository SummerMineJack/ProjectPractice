<?php
$str = "qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM1234567890";
$code = '';
for ($i = 0; $i < 4; $i++) {
    $code .= '<span style="color: rgb(' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ')">' . $str{mt_rand(0, strlen($str) - 1)} . '</span>';
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册页面</title>
</head>
<body>
<h1>用户注册页面</h1>
<form method="post" action="doAction.php">
    <table border="1" cellpadding="0" cellspacing="0" width="80%" bgcolor="#abcdef">
        <tr>
            <td>用户名</td>
            <td><input type="text" name="username" id="" placeholder="请输入用户名"/>用户名以字母或者数字开头，并且长度6~10位</td>
        </tr>
        <tr>
            <td>密&nbsp&nbsp&nbsp码</td>
            <td><input type="text" name="userpassword" id="" placeholder="请输入用户名"/>密码不能为空，密码长度6~10位</td>
        </tr>
        <tr>
            <td>确认密码</td>
            <td><input type="text" name="userpassword1" id="" placeholder="请输入用户名"/>两次密码一致</td>
        </tr>
        <tr>
            <td>邮箱</td>
            <td><input type="text" name="useremail" id="" placeholder="请输入用户名"/>邮箱必须包含@符</td>
        </tr>
        <tr>
            <td>兴趣爱好</td>
            <td><input type="checkbox" name="username" id="" value="php"/>PHP
                <input type="checkbox" name="username" id="" value="ios"/>IOS
                <input type="checkbox" name="username" id="" value="java"/>JAVA
                <input type="checkbox" name="username" id="" value="c"/>C
                <input type="checkbox" name="username" id="" value="c++"/>C++
                <input type="checkbox" name="username" id="" value="android"/>Android<br>
                <input type="checkbox" name="username" id="" value="nodejs"/>NodeJs
                <input type="checkbox" name="username" id="" value="python"/>Python
                <input type="checkbox" name="username" id="" value="flutter"/>Flutter
                <input type="checkbox" name="username" id="" value="reactnative"/>ReactNative
            </td>
        </tr>
        <tr>
            <td>验证码</td>
            <td><input type="text" name="verifycode" id="" placeholder="请输入验证码"/><?php echo $code; ?>
                <input type="text" hidden="hidden" name="verifycode1" id=""value="<?php echo $code; ?>"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="立即注册"></td>
        </tr>
    </table>

</form>
</body>
</html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="PHPCss.css">
    <title>PHP表单</title>
</head>
<body>
<!--表单-->
<div>
    <form action="welcome.php" method="post">
        用户名：<input type="text" name="username"><br>
        密　码：<input type="password" name="userpwd"><br>
        <input type="submit" value="提交">
    </form>
</div>
<!--单选框-->
<div>
    <form action="welcome.php" method="post">
        <select name="q">
            <option value="">请选择一个战队</option>
            <option value="RNG">RNG</option>
            <option value="EDG">EDG</option>
            <option value="TOP">TOP</option>
            <option value="SNG">SNG</option>
            <option value="BLG">BLG</option>
        </select>
        <input type="submit" value="提交">
    </form>
</div>
<!--多选框-->
<div>
    <form method="post" action="welcome.php">
        <select multiple="multiple" name="duoxuan[]">
            <option value="">请选择一个战队</option>
            <option value="RNG">RNG</option>
            <option value="EDG">EDG</option>
            <option value="TOP">TOP</option>
            <option value="SNG">SNG</option>
            <option value="BLG">BLG</option>
        </select>
        <input type="submit" value="提交">
    </form>
</div>
<!--单选按钮表单-->
<div>
    <form method="post" action="welcome.php">
        <input type="radio" name="danxuan" value="RNG"/>RNG
        <input type="radio" name="danxuan" value="EDG"/>EDG
        <input type="radio" name="danxuan" value="TOP"/>TOP
        <input type="radio" name="danxuan" value="SNG"/>SNG
        <input type="radio" name="danxuan" value="BLG"/>BLG
        <input type="submit" value="提交">
    </form>
</div>
<!--checkBox复选框-->
<div>
    <form method="post" action="welcome.php">
        <input type="checkbox" name="checkBox[]" value="RNG"> RNG<br>
        <input type="checkbox" name="checkBox[]" value="EDG"> EDG<br>
        <input type="checkbox" name="checkBox[]" value="TOP"> TOP<br>
        <input type="checkbox" name="checkBox[]" value="SNG"> SNG<br>
        <input type="checkbox" name="checkBox[]" value="BLG"> BLG<br>
        <input type="submit" value="提交">
    </form>
</div>
<!--表单验证-->
<div>
    <a href="FormCheck.php">表单验证</a>
</div>
</body>
</html>

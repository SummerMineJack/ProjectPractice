<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文件上传</title>
</head>
<body>
<form action="doActions.php" method="post" enctype="multipart/form-data">
    <label>文件名：</label>
    <input type="file" name="file" id="file"><br>
    <input type="submit" value="上传">
</form>

</body>
</html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="FormCheck.css" rel="stylesheet">
    <title>PHP表单验证</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/25
 * Time: 16:42
 */
$name = $email = $gender = $comment = $website = "";
$nameErr = $emailErr = $genderErr = $websiteErr = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //名字验证
    if (empty($_POST['formUserName'])) {
        $nameErr = "名字不可为空";
    } else {
        $name = testInput($_POST['formUserName']);
    }
    //邮箱验证
    if (empty($_POST['formUserEmail'])) {
        $emailErr = "邮箱不可为空";
    } else {
        $email = testInput($_POST['formUserEmail']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "邮箱格式不正确";
        }
    }
    //网址验证
    if (empty($_POST['formUserAddress'])) {
        $websiteErr = "网络地址不可为空";
    } else {
        $website = testInput($_POST['formUserAddress']);
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $websiteErr = "错误的网络地址";
            $website="";
        }
    }
    //备注验证
    if (empty($_POST['comment'])) {
        $comment = "";
    } else {
        $comment = testInput($_POST['comment']);
    }
    //性别验证
    if (empty($_POST['formUsergender'])) {
        $genderErr = "请选择性别";
    } else {
        $gender = testInput($_POST['formUsergender']);
    }


}

/**
 * @param $var 待格式化的字符串
 * @return string 格式化后的字符串
 */
function testInput($var) {
    $var = trim($var);
    $var = stripcslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}

?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    名字：<input type="text" name="formUserName" value="<?php echo $name ?>"><span
            class="error">*<?php echo $nameErr ?></span><br>
    Email：<input type="email" name="formUserEmail" value="<?php echo $email ?>"><span
            class="error">*<?php echo $emailErr ?></span><br>
    网址：<input type="text" name="formUserAddress" value="<?php echo $website ?>"><span
            class="error">*<?php echo $websiteErr ?></span><br>
    备注:<br> <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
    <br>
    性别：<input type="radio" name="formUsergender"
              value="male" <?php if (isset($gender) && $gender == 'male') echo "checked" ?> >男
    <input type="radio" name="formUsergender"
           value="female" <?php if (isset($gender) && $gender == 'female') echo "checked" ?> >女
    <span class="error">*<?php echo $genderErr ?></span>
    <input type="submit" name="提交">
</form>
<?php
echo "<h2>您输入的内容是:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
</body>
</html>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>欢迎页</title>
</head>
<body>
<div style="border: 1px solid red; width: 300px;">
    <label>表单</label>
    <p> 欢迎<strong style="color: red"><?php echo isset($_POST['username']) ? $_POST['username'] : "昵称" ?></strong></p>
    <p> 请记住密码<strong style="color: red"><?php echo isset($_POST['userpwd']) ? $_POST['userpwd'] : "初始密码" ?></strong></p>
</div>
<p><label style="color: red">下拉列表框</label>你选择的战队是<a><?php
    $q = isset($_POST['q']) ? htmlspecialchars($_POST['q']) : '';
    if ($q) {
        if ($q == 'RNG') {
            echo 'Royal Never Giveup';
        } else if ($q == 'EDG') {
            echo 'EDward Gaming';
        } else if ($q == 'TOP') {
            echo 'Topsports Gaming';
        } else if ($q == 'SNG') {
            echo 'SuNing Gaming';
        } else if ($q == 'BLG') {
            echo 'Bilibili Gaming';
        }
    }
    ?></p>
<p><label style="color: red">多选框</label>你的选择是：<?php
    $duoxuan = isset($_POST['duoxuan']) ? $_POST['duoxuan'] : "";
    if (is_array($duoxuan)) {
        $ZhanduiName = array("RNG" => "Royal Never Giveup", "EDG" => "EDward Gaming", "TOP" => "Topsports Gaming", "SNG" => "SuNing Gaming", "BLG" => "Bilibili Gaming");
        foreach ($duoxuan as $val) {
            echo $ZhanduiName[$val] . PHP_EOL . ",";
        }
    }

    ?> </p>
<p><label style="color: red">单选按钮框</label>你的选择是：<?php
$danxuan = isset($_REQUEST['danxuan']) ? $_REQUEST['danxuan'] : '';
if ($danxuan) {
    if ($danxuan == 'RNG') {
        echo 'Royal Never Giveup';
    } else if ($danxuan == 'EDG') {
        echo 'EDward Gaming';
    } else if ($danxuan == 'TOP') {
        echo 'Topsports Gaming';
    } else if ($danxuan == 'SNG') {
        echo 'SuNing Gaming';
    } else if ($danxuan == 'BLG') {
        echo 'Bilibili Gaming';
    }
}
?><p>
<p><label style="color: red">checkBox复选框</label>你的选择是：<?php
    $checkBoxDuoxuan = isset($_POST['checkBox']) ? $_POST['checkBox'] : "";
    if (is_array($checkBoxDuoxuan)) {
        $ZhanduiNames = array("RNG" => "Royal Never Giveup", "EDG" => "EDward Gaming", "TOP" => "Topsports Gaming", "SNG" => "SuNing Gaming", "BLG" => "Bilibili Gaming");
        foreach ($checkBoxDuoxuan as $val) {
            echo $ZhanduiNames[$val] . PHP_EOL . ",";
        }
    }
    ?></p>

<p><label style="color: red">表单验证</label>结果是：<?php

    ?></p>
</body>
</html>


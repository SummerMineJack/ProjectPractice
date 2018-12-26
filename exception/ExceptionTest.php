<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/26
 * Time: 16:15
 */

/*if (!file_exists("test.txt")) {
    error_log("文件不存在");
    die("文件不存在");
} else {
    $file = fopen("test.txt", "r+");
}*/

/*function detailError($errorno, $errorStr) {
    echo "<b>Error:</b> [$errorno] $errorStr<br>";
    echo "脚本结束";
    die();
}

set_error_handler("detailError",E_USER_WARNING);
echo($wq);*/

/*$test = 2;
if ($test > 1) {
    trigger_error("test变量必须小于1");
}*/

function checkNum($number) {

    if ($number > 1) {
        throw new Exception("Value must be 1 or below");
    }
    return true;
}

try {
    checkNum(4);
} catch (Exception $exception) {
    echo "抛异常了，兄弟，检查bug吧";
}
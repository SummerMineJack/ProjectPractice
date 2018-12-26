<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/26
 * Time: 10:38
 */
$file = fopen("phpFileTest.txt", "r+");
fwrite($file, "这是我通过PHP函数fwrite向文件里写的内容");
//进行逐行读取文件内容
/*
 * fgets是逐行读取内容
 * fgetc是逐字符读取内容
 *
 */
while (!feof($file)) {
    echo fgets($file) . "<br>";
}
//检测文件末尾函数
if (feof($file)) {
    echo "文件结尾";
}
fclose($file);
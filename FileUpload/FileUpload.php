<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/26
 * Time: 10:56
 */
//设置允许上传文件类型
$fileTypes = array("jpg", "png", "jpeg", "gif");
//首先获取当前的文件名称
$filename = $_FILES['file']['name'];
//然后进行截取文件后缀名
$fileEndName = explode(".", $filename);
$lastFileEndName = end($fileEndName);
echo $lastFileEndName;
if ((($_FILES['file']['type'] == "image/jpg") || ($_FILES['file']['type'] == "image/png") || ($_FILES['file']['type'] == "image/jpeg") || ($_FILES['file']['type'] == "image/gif")) && in_array($lastFileEndName, $fileTypes)) {
    if ($_FILES['file']['error'] > 0) {
        echo "上传文件出错：" . $_FILES['file']['error'];
    } else {
        echo "上传文件名：" . $_FILES['file']['name'] . "<br>";
        echo "上传文件类型：" . $_FILES['file']['type'] . "<br>";
        echo "上传文件大小：" . ($_FILES['file']['size']) . "kb<br>";
        echo "文件临时存储位置；" . $_FILES['file']['tmp_name'];
    }
} else if ($_FILES['file']['size'] > 2048000) {
    echo "仅支持文件大小为" . (2048000 / 1024) . "kb";
} else {
    echo "不支持" . $_FILES['file']['type'] . "类型的文件";
}

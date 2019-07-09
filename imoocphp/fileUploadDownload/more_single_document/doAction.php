<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/9
 * Time: 15:34
 */
include_once '../Single_document/fileUploadSingleDocument.fun.php';
//使用foreach进行循环查找fileinfo
foreach ($_FILES as $fileInfo) {
    $files[] = upload($fileInfo);
}
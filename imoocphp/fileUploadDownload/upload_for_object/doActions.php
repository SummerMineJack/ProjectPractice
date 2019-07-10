<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/10
 * Time: 13:35
 */
include_once 'upload.class.php';
$upload = new upload("file");
$des = $upload->uploadFile();
print_r($des);
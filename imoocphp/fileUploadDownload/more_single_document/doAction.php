<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/9
 * Time: 15:34
 */
include_once 'upload.fun1.php';
foreach ($_FILES as $fileInfo){
    $files[]=uploadFiles($fileInfo);
}
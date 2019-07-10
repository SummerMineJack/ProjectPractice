<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/9
 * Time: 15:22
 */
include_once 'fileUploadSingleDocument.fun.php';
$fileInfo = $_FILES['file'];
$newName = upload($fileInfo);
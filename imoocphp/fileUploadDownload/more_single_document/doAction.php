<?php
require_once 'upload.fun1.php';
require_once 'common.func.php';
$files=getFiles();
foreach($files as $fileInfo){
    $res=uploadFile($fileInfo);
    echo $res['mes'],'<br/>';
    $uploadFiles[]=$res['dest'];
}
$uploadFiles=array_values(array_filter($uploadFiles));
print_r($uploadFiles);
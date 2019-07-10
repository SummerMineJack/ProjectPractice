<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/9
 * Time: 13:50
 */
$fileName = $_FILES['file']['name'];
$fileType = $_FILES['file']['type'];
$fileTmpName = $_FILES['file']['tmp_name'];
$errorCode = $_FILES['file']['error'];
$fileSize = $_FILES['file']['size'];
$maxSize = 2097152;
$fileUploadPath = 'uploads';
$allowType = array("jpeg", "png", "jpg", "gif");
$flag = true;//是否检测真正图片的类型
if ($errorCode == UPLOAD_ERR_OK) {
    //判断文件的大小
    if ($fileSize > $maxSize) {
        exit("文件上传过大");
    }
    //判断文件上传类型
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowType)) {
        exit("非法的文件");
    }
    //判断文件是否是通过http进行上传的
    if (!is_uploaded_file($fileTmpName)) {
        exit("文件上传途径非法");
    }
    if ($flag) {
        if (!getimagesize($fileTmpName)) {
            exit("不是真正的图片");
        }
    }
    if (!file_exists($fileUploadPath)) {
        mkdir($fileUploadPath, 0777, true);
        chmod($fileUploadPath, 0777);
    }
    $uuidName = md5(uniqid(microtime(true), true)) . '.' . $ext;
    //@符可以抑制错误警告
    if (@move_uploaded_file($fileTmpName, $fileUploadPath . '/' . $uuidName)) {
        echo "文件" . $fileName . "上传成功";
    } else {
        echo "文件" . $fileName . "上传失败";
    }
} else {
    switch ($errorCode) {
        case UPLOAD_ERR_INI_SIZE:
            echo "文件上传大小已超过配置文件的最大大小";
            break;
        case UPLOAD_ERR_FORM_SIZE:
            echo "文件上传大小已超过表单设置的大小限制";
            break;
        case UPLOAD_ERR_PARTIAL:
            echo "文件上传不完整";
            break;
        case UPLOAD_ERR_NO_FILE:
            echo "没有文件被上传";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            echo "临时文件目录找不到";
            break;
        case UPLOAD_ERR_CANT_WRITE:
        case UPLOAD_ERR_EXTENSION:
            echo "系统错误";
            break;
    }
}

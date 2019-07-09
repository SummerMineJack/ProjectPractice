<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/9
 * Time: 15:16
 * @param $fileInfo
 * @param int $maxSize
 * @param bool $flag
 * @param string $fileUploadPath
 * @param array $allowType
 * @return array
 */
function upload($fileInfo, $maxSize = 2097152, $flag = true, $fileUploadPath = '../uploads', $allowType = array("jpeg", "jpg", "png", "gif"))
{
    if ($fileInfo['error'] == UPLOAD_ERR_OK) {
        //判断文件的大小
        if ($fileInfo['size'] > $maxSize) {
            exit("文件上传过大");
        }
        //判断文件上传类型
        $ext = pathinfo($fileInfo['name'], PATHINFO_EXTENSION);
        if (!in_array($ext, $allowType)) {
            exit("非法的文件");
        }
        //判断文件是否是通过http进行上传的
        if (!is_uploaded_file($fileInfo['tmp_name'])) {
            exit("文件上传途径非法");
        }
        if ($flag) {
            if (!getimagesize($fileInfo['tmp_name'])) {
                exit("不是真正的图片");
            }
        }
        if (!file_exists($fileUploadPath)) {
            mkdir($fileUploadPath, 0777, true);
            chmod($fileUploadPath, 0777);
        }
        $uuidName = md5(uniqid(microtime(true), true)) . '.' . $ext;
        //@符可以抑制错误警告
        if (@move_uploaded_file($fileInfo['tmp_name'], $fileUploadPath . '/' . $uuidName)) {
            echo "文件" . $fileInfo['name'] . "上传成功";
        } else {
            echo "文件" . $fileInfo['name'] . "上传失败";
        }
    } else {
        switch ($fileInfo['error']) {
            case UPLOAD_ERR_INI_SIZE:
                $msg = "文件上传大小已超过配置文件的最大大小";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $msg = "文件上传大小已超过表单设置的大小限制";
                break;
            case UPLOAD_ERR_PARTIAL:
                $msg = "文件上传不完整";
                break;
            case UPLOAD_ERR_NO_FILE:
                $msg = "没有文件被上传";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $msg = "临时文件目录找不到";
                break;
            case UPLOAD_ERR_CANT_WRITE:
            case UPLOAD_ERR_EXTENSION:
                $msg = "系统错误";
                break;
        }
        echo $msg;
    }
    return array("newPath" => $uuidName);
}
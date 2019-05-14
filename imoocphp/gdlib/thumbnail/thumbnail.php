<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/14
 * Time: 11:24
 */
$imageFileName = '../images/bg1.jpg';
//获取图片信息
$imageFileInfo = getimagesize($imageFileName);
// 设置最大宽高
$dst_w = 800;
$dst_h = 800;
if ($imageFileName) {
    list($src_width, $src_height) = $imageFileInfo;
    $mime = $imageFileInfo['mime'];
} else {
    die('不是真图片');
}
$createFun = str_replace('/', 'createfrom', $mime);
$outFun = str_replace('/', null, $mime);
//等比例缩放算法
$ratio_orig = $src_width / $src_height;

if ($dst_w / $dst_h > $ratio_orig) {
    $dst_w = $dst_h * $ratio_orig;
} else {
    $dst_h = $dst_w / $ratio_orig;
}
//创建一个缩略图 640x360的图片
//创建一个新画布的对象
$dst_img = imagecreatetruecolor($dst_w, $dst_h);
//通过png，jpeg等图片创建画布
$src_img = $createFun($imageFileName);
imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $dst_w, $dst_h, $src_width, $src_height);
$outFun($dst_img, '../images/thumb_640x36012.jpg');
imagedestroy($dst_img);
imagedestroy($src_img);
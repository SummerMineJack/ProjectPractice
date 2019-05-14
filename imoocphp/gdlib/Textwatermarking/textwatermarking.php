<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/14
 * Time: 14:39
 */
header('Content-Type:image/png');
$filename = '../images/bg1.jpg';
$fileInfo = getimagesize($filename);
$mime = $fileInfo['mime'];
$createFun = str_replace('/', 'createfrom', $mime);
$outFun = str_replace('/', null, $mime);
//将需要加水印的原图片创建图片对象
$srcImage = $createFun($filename);
//创建一个红色
$red = imagecolorallocatealpha($srcImage, 255, 0, 0, 60);
imagettftext($srcImage, 32, 0, 0, 50, $red, 'C:/Windows/Fonts/simkai.TTF', "黄俭的桌面专用图片");
header('Content-Type:' . $mime);
$outFun($srcImage);
imagedestroy($srcImage);
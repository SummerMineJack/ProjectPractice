<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/13
 * Time: 15:34
 */
//新建一个canvas 500x500 的画布
$width = 500;
$height = 500;
$image = imagecreatetruecolor($width, $height);
//为画布设置底色
$red = imagecolorallocate($image, 255, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$randColor = imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
//使用imagefilledrectangle进行覆盖将画布变为白色
imagefilledrectangle($image, 0, 0, $width, $height, $white);
//开始绘画
//把文字画在图片中【水平字符】
imagechar($image, 32, 0, 0, 'K', $red);
//把文字画在图片中【垂直字符】
imagecharup($image, 32, 10, 10, 'K', $red);
//绘制字符串【水平】
imagestring($image, 32, 20, 20, "hello world", $red);

//显示到浏览器告诉浏览器已图片形式显示到浏览器
header('Content-Type:image/png');
imagepng($image);
imagepng($image, 'images/2.png');//保存图片文件
imagedestroy($image);

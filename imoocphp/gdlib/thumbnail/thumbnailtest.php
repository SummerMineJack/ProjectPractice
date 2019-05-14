<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/14
 * Time: 14:01
 */
/**
 * 要求 ： 指定缩放比例
 *         最大宽度最大高度等比例缩放
 *          可以对缩略图文件添加前缀
 *          选择是否删除源文件
 */
/**
 * @param $filename 图片文件名称
 * @return mixed   返回图片信息，图片的高宽度，扩展名等
 */
function getImageInfo($filename)
{
    //首先判断是否是真实有效的图片
    if (@!$info = getimagesize($filename)) {
        exit('不是真实有效的图片');
    }
    $fileInfo['width'] = $info[0];
    $fileInfo['height'] = $info[1];
    $mime = image_type_to_mime_type($info[2]);
    $createFun = str_replace('/', 'createfrom', $mime);
    $outFun = str_replace('/', null, $mime);
    $fileInfo['createFun'] = $createFun;
    $fileInfo['outFun'] = $outFun;
    $fileInfo['ext'] = strtolower(image_type_to_extension($info[2]));
    return $fileInfo;
}

/**
 * @param $fileName   图片名称
 * @param null $dst_w 缩略图最大宽度
 * @param null $dst_h 缩略图最大高度
 * @param float $scale 缩放比例
 * @param string $dest 缩略图存放目录
 * @param string $pre 缩略图前缀
 * @param bool $delSource 是否删除源文件s
 */
function thumb($fileName, $dst_w = null, $dst_h = null, $scale = 0.5, $dest = '../images/thumb', $pre = 'thumb_', $delSource = false)
{
    $fileInfo = getImageInfo($fileName);
    $src_w = $fileInfo['width'];
    $src_h = $fileInfo['height'];
    //如果指定了最大高宽度就计算缩放比例，否则使用默认缩放比例
    if (is_numeric($dst_w) && is_numeric($dst_h)) {
        $ratio_orig = $src_w / $src_h;
        if ($dst_w / $dst_h > $ratio_orig) {
            $dst_w = $dst_h * $ratio_orig;
        } else {
            $dst_h = $dst_w / $ratio_orig;
        }
    } else {
        $dst_w = ceil($src_w * $scale);
        $dst_h = ceil($src_h * $scale);
    }
    //创建目标画布对象
    $dst_image = imagecreatetruecolor($dst_w, $dst_h);
    //创建源画布对象
    $src_image = $fileInfo['createFun']($fileName);
    imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
    //检测当前保存目录是否存在，不存在则创建目录
    if ($dest && !file_exists($dest)) {
        mkdir($dest, 0777, true);
    }
    //创建6位随机数用于图片前缀
    $randNum = mt_rand(100000, 999999);
    //图片前缀名称拼接
    $destName = "{$pre}{$randNum}" . $fileInfo['ext'];
    //判断是否设置存放目录，如果不是就直接使用文件名
    $destination = $dest ? $dest . '/' . $destName : $destName;
    //输出图片
    $fileInfo['outFun']($dst_image, $destination);
    imagedestroy($src_image);
    imagedestroy($dst_image);
    if ($delSource) {
        @unlink($fileName);
    }
    return $destination;
}


/**
 * @param $filename 文件路径
 * @param $fontfile 字体文件
 * @param string $text 文字水印内容
 * @param string $dest 存放图片目录
 * @param string $pre 图片前缀
 * @param int $red 红色值
 * @param int $green 绿色值
 * @param int $blue 蓝色值
 * @param int $alpha 透明值
 * @param int $size 字体大小
 * @param int $gle 字体倾斜角度
 * @param int $x 文字x坐标
 * @param int $y 文字y坐标
 * @param bool $delSource 是否删除源文件
 * @return string
 */
function waterText($filename, $fontfile, $text = '黄俭的桌面专用图片', $dest = '../images/waterImage', $pre = 'waterImage_', $red = 255, $green = 0, $blue = 0, $alpha = 60, $size = 32, $gle = 0, $x = 0, $y = 50, $delSource = false)
{
    $fileInfo = getImageInfo($filename);
//将需要加水印的原图片创建图片对象
    $srcImage = $fileInfo['createFun']($filename);
//创建一个红色
    $red = imagecolorallocatealpha($srcImage, $red, $green, $blue, $alpha);
    imagettftext($srcImage, $size, $gle, $x, $y, $red, $fontfile, $text);
    //检测当前保存目录是否存在，不存在则创建目录
    if ($dest && !file_exists($dest)) {
        mkdir($dest, 0777, true);
    }
    //创建6位随机数用于图片前缀
    $randNum = mt_rand(100000, 999999);
    //图片前缀名称拼接
    $destName = "{$pre}{$randNum}" . $fileInfo['ext'];
    //判断是否设置存放目录，如果不是就直接使用文件名
    $destination = $dest ? $dest . '/' . $destName : $destName;
    //输出图片
    $fileInfo['outFun']($srcImage, $destination);
    imagedestroy($srcImage);
    if ($delSource) {
        @unlink($filename);
    }
    return $destination;
}

/**
 * @param $dstName 水印图片文件路径
 * @param $srcName 目标水印图片文件路径
 * @param int $position 水印放置目标文件的位置
 * @param string $dest 存放合成后的图片位置
 * @param int $pct 水印图片的透明度
 * @param bool $delSource 是否删除目标图片文件
 * @return string
 */
function waterImage($dstName, $srcName, $position = 0, $dest = '../images/waterImage4Image', $pct = 50, $delSource = false)
{
    //获取目标和原图片信息
    $dstInfo = getImageInfo($dstName);
    $srcInfo = getImageInfo($srcName);
    //获取目标和原图片的对象
    $dstImage = $dstInfo['createFun']($dstName);
    $srcImage = $srcInfo['createFun']($srcName);
    //获取目标和原图片的高宽
    $dst_w = $dstInfo['width'];
    $dst_h = $dstInfo['height'];
    $src_w = $srcInfo['width'];
    $src_h = $srcInfo['height'];
    switch ($position) {
        case 0:
            $x = 0;
            $y = 0;
            break;
        case 1:
            $x = ($src_w - $dst_w) / 2;
            $y = 0;
            break;
        case 2:
            $x = $src_w - $dst_w;
            $y = 0;
            break;
        case 3:
            #x=0;
            $y = ($src_h - $dst_h) / 2;
            break;
        case 4:
            $x = ($src_w - $dst_w) / 2;
            $y = ($src_h - $dst_h) / 2;
            break;
        case 5:
            $x = $src_w - $dst_w;
            $y = ($src_h - $dst_h) / 2;
            break;
        case 6;
            $x = 0;
            $y = $src_h - $dst_h;
            break;
        case 7:
            $x = ($src_w - $dst_w) / 2;
            $y = $src_h - $dst_h;
            break;
        case 8:
            $x = $src_w - $dst_w;
            $y = $src_h - $dst_h;
            break;
    }
    imagecopymerge($srcImage, $dstImage, $x, $y, 0, 0, $src_w, $src_h, $pct);
    //检测当前保存目录是否存在，不存在则创建目录
    if ($dest && !file_exists($dest)) {
        mkdir($dest, 0777, true);
    }
    //创建6位随机数用于图片前缀
    $randNum = mt_rand(100000, 999999);
    //图片前缀名称拼接
    $destName = "waterImage4Image_{$randNum}" . $srcInfo['ext'];
    //判断是否设置存放目录，如果不是就直接使用文件名
    $destination = $dest ? $dest . '/' . $destName : $destName;
    //输出图片
    $dstInfo['outFun']($srcImage, $destination);
    imagedestroy($srcImage);
    if ($delSource) {
        @unlink($srcName);
    }
    return $destination;
}



<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/9
 * Time: 10:15
 */
header("Content-Type:image/png");
/**
 * @param int $type 验证码类型【1，数字、2，字母、3，字母加数字】
 * @param int $width 验证码宽度
 * @param int $height 验证码高度
 * @param int $length 验证码长度
 */
function genrateverify($type = 3, $width = 200, $height = 50, $length = 4)
{
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    imagefilledrectangle($image, 0, 0, $width, $height, $white);
    //编写随机颜色函数
    function randColor($image)
    {
        return imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    }

    //根据选择验证码类型选择
    switch ($type) {
        case 1:
            $str = join('', array_rand(range(0, 9), $length));
            break;
        case 2:
            $str = join('', array_rand(array_flip(array_merge(range('a', 'z'), range('A', 'Z'))), $length));
            break;
        case 3:
            $str = join('', array_rand(array_flip(array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'))), $length));
            break;
    }
    /**
     * 干扰线
     */
    for ($i = 0; $i < 20; $i++) {
        $x1 = rand(1, $width - 1);
        $y1 = rand(1, $width - 1);
        $x2 = rand(1, $width - 1);
        $y2 = rand(1, $width - 1);
        imageline($image, $x1, $y1, $x2, $y2, randcolor($image));
    }
    /**
     * 将上面随机获取的文字内容画到画布上【注意：imagettftext这个方法最好还是使用本地盘符里面的字体，将字体放在本地文件夹中为何不生效，还不得而知】
     */
    for ($i = 0; $i < $length; $i++) {
        imagettftext($image, 32, mt_rand(-30, 30), $i * ($width / $length), mt_rand($height - 15, 35), randcolor($image), 'C:/Windows/Fonts/alger.ttf', $str[$i]);
    }
    /**
     * 绘制干扰点
     */
    for ($i = 0; $i <= 999; $i++) {
        imagesetpixel($image, mt_rand(0, $width), mt_rand(0, $height), randColor($image));
    }
    imagepng($image);
    imagedestroy($image);
    return $str;
}
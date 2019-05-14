<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/9
 * Time: 10:15
 */
header("Content-Type:image/png");
/**
 * @param int $type 验证码类型【1，数字、2，字母、3，字母加数字、4，汉字】
 * @param int $width 验证码宽度
 * @param int $height 验证码高度
 * @param int $length 验证码长度
 */
function genrateverifys($type = 3, $width = 200, $height = 50, $length = 4)
{
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    imagefilledrectangle($image, 0, 0, $width, $height, $white);
    //编写随机颜色函数
    function randColor($image)
    {
        return imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    }

    $strArr = '家,庭,是,社,会,的,基,本,细,胞,是,人,生,的,第,一,所,学,校,不,论,时,代,发,生,多,大,变,化,不,论,生,活,格,局,发,生,多,大,变,化,我,们,都,要,重,视,家,庭,建,设,注,重,家,庭,注,重,家,教,注,重,家,风,紧,密,结,合,培,育,和,弘,扬,社,会,主,义,核,心,价,值,观';
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
        case 4:
            $str = join('', array_rand(array_flip(explode(',', $strArr)), $length));
            break;
    }
    /**
     * 干扰线
     */
    for ($i = 0; $i < 10; $i++) {
        imageline($image, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), randcolor($image));
    }
    /**
     * 将上面随机获取的文字内容画到画布上【注意：imagettftext这个方法最好还是使用本地盘符里面的字体，将字体放在本地文件夹中为何不生效，还不得而知】
     */
    for ($i = 0; $i < $length; $i++) {
        $size = mt_rand(26, 32);
        $x = 20 + ceil($width / $length) * $i;
        $y = 35;
        $text = mb_substr($str, $i, 1, 'utf-8');
        imagettftext($image, $size, mt_rand(-15, 15), $x, $y, randcolor($image), 'C:/Windows/Fonts/simkai.TTF', $text);
    }

    for ($i = 0; $i < 4; $i++) {
        imagearc($image, mt_rand(0, 50), mt_rand(0, 50), 50, 50, mt_rand(0, 90), mt_rand(0, 90), randcolor($image));
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
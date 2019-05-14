<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/14
 * Time: 10:03 验证码工具类
 */

class VerifyCodeUtil
{
    //设置验证码的字体
    private $fontsFile = '';
    //设置验证码图片的宽度
    private $width = 200;
    //设置验证码图片的高度
    private $heigth = 50;
    //设置验证码字体的大小
    private $size = 28;
    //设置验证码长度
    private $length = 4;
    //画布对象
    private $image = null;
    //设置验证码干扰像素
    private $pixel = 999;
    //设置验证码干扰线
    private $line = 10;

    //构造方法初始化验证码
    public function __construct($config = array())
    {
        //先判断用户是否有自定的验证码配置文件
        if (is_array($config) && count($config) > 0) {
            //首先判断字体文件是否存在，是否可读，是否是文件
            if (isset($config['fontsfile']) && is_file($config['fontsfile']) && is_readable($config['fontsfile'])) {
                $this->fontsFile = $config['fontsfile'];
            } else {
                return false;
            }
            //检查是否设置验证码图片宽度
            if (isset($config['width']) && $config['width'] > 0) {
                $this->width = $config['width'];
            }
            //检查是否设置验证码图片高度
            if (isset($config['height']) && $config['height'] > 0) {
                $this->heigth = $config['height'];
            }
            //检查是否设置验证码图片字体大小
            if (isset($config['size']) && $config['size'] > 0) {
                $this->size = $config['size'];
            }
            //检查是否设置验证码长度
            if (isset($config['length']) && $config['length'] > 0) {
                $this->length = $config['length'];
            }
            //检查是否设置验证码干扰元素
            if (isset($config['pixel']) && $config['pixel'] > 0) {
                $this->pixel = $config['pixel'];
            }
            $this->image = imagecreatetruecolor($this->width, $this->heigth);
            return $this->image;

        } else {
            return false;
        }
    }

    /**
     * 获取验证码对象
     */
    public function getVerifyCode()
    {
        $white = imagecolorallocate($this->image, 255, 255, 255);
        imagefilledrectangle($this->image, 0, 0, $this->width, $this->heigth, $white);
        //生成验证码
        $str = $this->generateStr($this->length);
        if (false === $str) {
            return false;
        }
        //绘制验证码
        for ($i = 0; $i < $this->length; $i++) {
            $size = mt_rand(26, 32);
            $x = 20 + ceil($this->width / $this->length) * $i;
            $y = mt_rand(ceil($this->heigth / 3), $this->heigth - 5);
            $text = mb_substr($str, $i, 1, 'utf-8');
            imagettftext($this->image, $size, mt_rand(-15, 15), $x, $y, $this->randColors(), 'C:/Windows/Fonts/simkai.TTF', $text);
        }
        if ($this->line) {
            $this->getLine();
        }
        if ($this->pixel) {
            $this->getPixel();
        }
        header('Content-Type:image/png');
        imagepng($this->image);
        imagedestroy($this->image);
        return strtolower($str);
    }

    /**
     * @param int $length 验证码长度
     * @return bool|string 验证码内容
     */
    private function generateStr($length = 4)
    {
        if ($length < 0 || $length > 30) {
            return false;
        }
        $str = join('', array_rand(array_flip(array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'))), $length));
        return $str;
    }

    /**
     * @param $image
     * @return int 编写随机颜色函数
     */
    private function randColors()
    {
        return imagecolorallocate($this->image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    }

    /**
     * 干扰线
     */
    private function getLine()
    {
        for ($i = 0; $i < $this->line; $i++) {
            imageline($this->image, mt_rand(0, $this->width), mt_rand(0, $this->heigth), mt_rand(0, $this->width), mt_rand(0, $this->heigth), $this->randColors());
        }
    }

    /**
     * 干扰元素
     */
    private function getPixel()
    {
        for ($i = 0; $i <= $this->pixel; $i++) {
            imagesetpixel($this->image, mt_rand(0, $this->width), mt_rand(0, $this->heigth), $this->randColors());
        }
    }
}
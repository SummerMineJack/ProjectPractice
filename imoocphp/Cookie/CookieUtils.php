<?php

/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/8
 * Time: 15:57
 */
class CookieUtils
{
    static private $_instance = null;
    //设置cookie的默认值
    private $expire = 0;
    private $domain = '';
    private $path = '';
    private $secure = false;
    private $httponly = false;

    /**
     * CookieUtils constructor.
     * @param array $option
     * 构造函数完成初始化操作
     */
    private function __construct(array $option = [])
    {
        $this->setOptions($option);
    }

    private function setOptions(array $options = [])
    {
        if (isset($options['$expire'])) {
            $this->expire = (int)$options['$expire'];
        }
        if (isset($options['$domain'])) {
            $this->domain = $options['$domain'];
        }
        if (isset($options['$path'])) {
            $this->path = $options['$path'];
        }
        if (isset($options['$secure'])) {
            $this->secure = (bool)$options['$secure'];
        }
        if (isset($options['$httponly'])) {
            $this->httponly = (bool)$options['$httponly'];
        }
        return $this;
    }

    /**
     * @param array $option 设置cookie的相关选项
     * @return null 对象实例
     */
    public static function getInstance(array $option = [])
    {
        if (is_null(self::$_instance)) {
            $class = __CLASS__;
            self::$_instance = new $class($option);
        }
        return self::$_instance;
    }

    /**
     * @param $name
     * @param $values
     * @param array $options
     * 设置cookie
     */
    public function set($name, $values, array $options = [])
    {
        if (is_array($options) && count($options) > 0) {
            $this->setOptions($options);
        }
        if (is_array($values) || is_object($values)) {
            $values = json_encode($values);
        }
        setcookie($name, $values, $this->expire, $this->path, $this->domain, $this->secure, $this->httponly);
    }

    /**
     * @param $name
     * @return mixed|null
     * 根据cookie名称获取值
     */
    public function get($name)
    {
        if (isset($_COOKIE[$name])) {
            return substr($_COOKIE[$name], 0, 1) == '{' ? json_decode($_COOKIE[$name]) : $_COOKIE[$name];
        } else {
            return null;
        }
    }

    /**
     * @param $name
     * @param array $options
     * 删除某个cookie
     */
    public function delete($name, array $options = [])
    {
        if (is_array($options) && count($options) > 0) {
            $this->setOptions($options);
        }
        if (isset($_COOKIE[$name])) {
            setcookie($name, '', time() - 1, $this->path, $this->domain, $this->secure, $this->httponly);
            unset($_COOKIE[$name]);
        }

    }


    /**
     * @param array $options
     * 删除全部cookie
     */
    public function deleteAll(array $options = [])
    {
        if (is_array($options) && count($options) > 0) {
            $this->setOptions($options);
        }
        if (!empty($_COOKIE)) {
            foreach ($_COOKIE as $name => $values) {
                setcookie($name, '', time() - 1, $this->path, $this->domain, $this->secure, $this->httponly);
                unset($_COOKIE[$name]);
            }
        }
    }

}

<?php

/**
 * Created by PhpStorm.
 * User: Summer
 * Date: 2018/12/27
 * Time: 20:36
 */
class mysqlConntect
{
    private $mysqli;
    private static $host = 'localhost';
    private static $user = 'root';
    private static $password = 'hj1649789..';
    private static $database = 'userinfo';
    private static $port = '8809';
//    private static $port = '3306';
    private static $instance;

    private function __construct()
    {
        //连接数据库
        $this->openConntect();
        //设置字符集
        $this->charsetOfDB();
    }


    /**
     * 设置数据库的单例模式
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 设置数据库字符集
     *
     */
    private function charsetOfDB()
    {
        mysqli_query($this->mysqli, 'set names utf8');
    }


    /**
     * 首先连接数据库
     */
    private function openConntect()
    {
        $this->mysqli = mysqli_connect(self::$host, self::$user, self::$password, self::$database, self::$port);
        if (!$this->mysqli) {
            echo "数据库连接失败<br>";
            echo "错误编码" . mysqli_errno($this->mysqli) . "<br>";
            echo "错误信息" . mysqli_error($this->mysqli) . "<br>";
            exit;
        }
    }

    public function getCharset()
    {
        return mysqli_get_charset($this->mysqli);
    }

    /**
     * 获取添加数据的id
     */
    public function getInsertId()
    {

        return $this->mysqli->insert_id();
    }

    /**
     * 添加
     */
    public function insert($table, $params = array())
    {

    }


    /**
     * 根据sql语句进行查询
     */
    public function sel4Sql($sql)
    {
        $result = $this->mysqli->query($sql);
        return $result;
    }

    /**
     * 查询所有
     */
    public function selectAll($table)
    {
        $sql = "select * from {$table}";
        $result = mysqli_query($this->mysqli, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $row[] = $row;
            }
        } else {
            $row = false;
        }
        return $row;
    }

}
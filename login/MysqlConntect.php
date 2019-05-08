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
    private $result;

    public function conntct()
    {
        $this->mysqli = new mysqli("localhost", "root", "hj1649789..", "userinfo", "3306");
    }

    /**
     * 插入
     */
    public function insertValue($table, $data)
    {
        $sql = "insert into " . $table . " values (0, '{$data['username']}','{$data['userpwd']}')";
        return $result = $this->mysqli->query($sql);
    }

    /**
     * @param $sql
     * @return mixed
     * 根据sql语句进行查询
     */
    public function sel4Sql($sql)
    {
        return $result = $this->mysqli->query($sql);
    }

    /**
     * 查询
     */
    public function selValue($table, $username, $userpwd)
    {
        $sql = "select id from $table where username='$username' and userpassword='$userpwd'";
        return $result = $this->mysqli->query($sql);
    }

    /**
     * 关闭数据库连接
     */
    public function closeDBconnect()
    {
        $this->mysqli->close();
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: Summer
 * Date: 2018/12/27
 * Time: 20:36
 */
class imoocMysqlConn
{
    private $mysqli;
    private $result;

    public function conntct()
    {
        $this->mysqli = new mysqli("localhost", "root", "hj1649789..", "userinfo", "8809");
    }

    /**
     * 插入
     */
    public function insertValue($table, $data)
    {
        $sql = "insert into " . $table . " values (0, '{$data['username']}','{$data['userpwd']}')";
        if ($this->mysqli->query($sql) === TRUE) {
            return 1;
        } else {
            return $this->mysqli->error;
        }
    }

    /**
     * 查询
     */
    public function selValue($table, $username, $userpwd)
    {
        $sql = "select id from $table where username='$username' and userpassword='$userpwd'";
        $result = $this->mysqli->query($sql);
        return $result;
    }

    /**
     * 根据sql语句去查询
     */
    public function sel4sql($sql)
    {
        $result = $this->mysqli->query($sql);
        return $result;
    }

    /**
     * 关闭数据库连接
     */
    public function closeDBconnect()
    {
        $this->mysqli->close();
    }
}
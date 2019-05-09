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
        $this->mysqli=mysqli_connect("localhost", "root", "hj1649789..", "userinfo", "8809");

//        $this->mysqli = new mysqli("localhost", "root", "hj1649789..", "userinfo", "3306");//家的端口号

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
        $result = $this->mysqli->query($sql);
        return $result;
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
     * 关闭数据库连接
     */
    public function closeDBconnect()
    {
        $this->mysqli->close();
    }
}
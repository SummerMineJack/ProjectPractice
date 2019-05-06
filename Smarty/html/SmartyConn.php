<?php

/**
 * Created by PhpStorm.
 * User: Summer
 * Date: 2018/12/27
 * Time: 20:36
 */
class mysqlConntect {
    private $mysqli;
    private $result;

    public function conntct() {
        $this->mysqli = new mysqli("localhost", "root", "hj1649789..", "userinfo", "3306");
    }

    /**
     * 插入
     */
    public function insertValue($table, $data) {
        $sql = "insert into " . $table . " values (0, '{$data['username']}','{$data['userpassword']}','{$data['useremail']}')";
        if ($this->mysqli->query($sql) === TRUE) {
            return 1;
        } else {
            return $this->mysqli->error;
        }
    }

    /**
     * 查询
     */
    public function selValue($table, $username, $userpwd) {
        $sql = "select id from $table where username='$username' and userpwd='$userpwd'";
        $result = $this->mysqli->query($sql);
        $number = mysqli_num_rows($result);
        if ($number) {
            return 1;
        } else {
            return 0;
        }

    }

    /**
     * 关闭数据库连接
     */
    public function closeDBconnect() {
        $this->mysqli->close();
    }
}
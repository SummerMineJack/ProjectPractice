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
        $sql = "insert into" . $table . " (username,userpwd) values ('{$data['username']}','{$data['userpwd']}')";
        $this->mysqli->query($sql);
        return $this->mysqli->insert_id;
    }
}
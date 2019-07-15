<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/15
 * Time: 9:35
 */
header('content-type: text/html; charset=utf-8');
try {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "hj1649789..";
    $dbname = "userinfo";
    //通过参数的形式连接数据库
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    echo $pdo;
} catch (PDOException $e) {
    echo $e->getMessage();
}
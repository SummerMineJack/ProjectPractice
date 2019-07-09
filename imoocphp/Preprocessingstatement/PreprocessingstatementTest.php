<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/22
 * Time: 11:26
 */

$username = "huangjian";
$userpassword = "hj1649789..";
//使用预处理语句进行防止sql注入
$mysqli = mysqli_connect("localhost", "root", "hj1649789..", "userinfo", "8809");
$mysqli->set_charset("utf8");
$sql = "select * from userinfo where username=?z and userpassword=?";
$mysqli_stmt = $mysqli->prepare($sql);
$mysqli_stmt->bind_param("ss", $username, $userpassword);
if ($mysqli_stmt->execute()) {
    $mysqli_stmt->store_result();
    if ($mysqli_stmt->num_rows > 0) {
        echo "登录成功";
    } else {
        echo "登录失败";
    }
}
//释放结果集
$mysqli_stmt->free_result();
//关闭连接
$mysqli_stmt > close();
$mysqli->close();
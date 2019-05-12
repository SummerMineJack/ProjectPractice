<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/10
 * Time: 13:33
 */
require_once '../../login/MysqlConntect.php';
require 'Products.class.php';

$proName = $_POST['productName'];
$proPrice = $_POST['productPrice'];
$proTip = $_POST['productTip'];
$proImg = $_POST['productImg'];

$connect = mysqlConntect::getInstance();
$sql = "INSERT product VALUES(0,'$proName','$proPrice','$proTip','$proImg');";
$result = $connect->sel4Sql($sql);
if (mysqli_num_rows($result)) {
    $result = array('code' => 200, 'msg' => '添加成功');
    echo json_encode($result);
}

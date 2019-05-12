<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/10
 * Time: 13:33
 */
require_once '../../login/MysqlConntect.php';
require 'Products.class.php';

$proName = isset($_POST['productName']) ? $_POST['productName'] : "";
$proPrice = isset($_POST['productPrice']) ? $_POST['productPrice'] : "";
$proTip = isset($_POST['productTip']) ? $_POST['productTip'] : "";
$proImg = isset($_POST['productImg']) ? $_POST['productImg'] : "";

$connect = mysqlConntect::getInstance();
$sql = "INSERT product VALUES(0,'$proName','$proPrice','$proTip','$proImg');";
$result = $connect->sel4Sql($sql);
if ($result==1) {
    $results = array('code' => 200, 'msg' => '添加成功');
    echo json_encode($results);
}

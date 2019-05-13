<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/10
 * Time: 13:33
 */
require_once '../../login/MysqlConntect.php';
require 'Products.class.php';

$proUpId = $_POST['productId'];
$proUpName = $_POST['productName'];
$proUpPrice = $_POST['productPrice'];
$proUpTip = $_POST['productTip'];
$proUpImg = $_POST['productImg'];

$connect = mysqlConntect::getInstance();
$sql = "UPDATE product SET productName = '$proUpName',productImg='$proUpImg',productPrice='$proUpPrice',productTip='$proUpTip' WHERE id = $proUpId";
$result = $connect->sel4Sql($sql);
if ($result == 1) {
    $result = array('code' => 200, 'msg' => '更新成功');
    echo json_encode($result);
}

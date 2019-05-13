<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/10
 * Time: 13:33
 */
require_once '../../login/MysqlConntect.php';
require 'Products.class.php';

$proId = $_POST['productId'];
//$proId = 6;
$connect = mysqlConntect::getInstance();
$sql = "DELETE FROM product WHERE id = '$proId' ";
$result = $connect->sel4Sql($sql);
if ($result == 1) {
    $result = array('code' => 200, 'msg' => '删除成功');
    echo json_encode($result);
}

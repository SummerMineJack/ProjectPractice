<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/10
 * Time: 13:33
 */
require_once '../../login/MysqlConntect.php';
require 'Products.class.php';

$connect = mysqlConntect::getInstance();
$sql = "select * from product";
$result = $connect->sel4Sql($sql);
if (mysqli_num_rows($result)) {
    while ($row = $result->fetch_array()) {
        $pro = new Products();
        $pro->id = $row[0];
        $pro->productName = $row[1];
        $pro->productPrice = $row[2];
        $pro->productTip = $row[3];
        $pro->productImg = $row[4];
        $rows[] = $pro;
    }
    $result = array('code' => 200, 'msg' => '成功', 'data' => $rows);
    echo json_encode($result);
}

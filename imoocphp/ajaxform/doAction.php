<?php
/**
 * Created by PhpStorm.
 * User: Summer
 * Date: 2019/5/15
 * Time: 20:49
 */

require_once '../../login/MysqlConntect.php';
require_once 'Products.class.php';
$connect = mysqlConntect::getInstance();
$action = $_GET['action'];
switch ($action) {
    case "init_table":
        initTable($connect);
        break;
    case "add_row":
        addRow($connect);
        break;
    case "del_row":
        delRow($connect);
        break;
    case "update_row":
        updateRow($connect);
        break;
    case "select_limit":
        selectForLimit($connect);
        break;
    case "get_all":
        getAllPage($connect);
        break;
}
/**
 * @param $connect 查询初始化table
 */
function initTable($connect)
{
    $page = $_GET['p'];
    $sql = "select * from product LIMIT " . ($page - 1) * 5 . ",5";
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
}

/**
 * @param $connect 查询初始化table
 */
function getAllPage($connect)
{
    $sql = "select count(*) from product";
    $result = $connect->sel4Sql($sql);
    $rows = mysqli_fetch_array($result);
    if (mysqli_num_rows($result)) {
        $result = array('code' => 200, 'msg' => '成功', 'data' => $rows);
        echo json_encode($result);
    }
}


/**
 * @param $connect
 * 添加数据
 */

function addRow($connect)
{
    $sql = "INSERT product VALUES(0,'{$_POST['productName']}','{$_POST['productPrice']}','{$_POST['productTip']}','{$_POST['productImg']}');";
    $result = $connect->sel4Sql($sql);
    $inserId = $connect->getInsertId();
    if ($result == 1) {
        $results = array('code' => 200, 'msg' => '添加成功', 'data' => $inserId);
        echo json_encode($results);
    }
}

/**
 * @param $connect 根据id删除对应的商品信息
 */

function delRow($connect)
{
    $sql = "DELETE FROM product WHERE id = '{$_POST['productId']}' ";
    $result = $connect->sel4Sql($sql);
    if ($result == 1) {
        $result = array('code' => 200, 'msg' => '删除成功');
        echo json_encode($result);
    }
}

/**
 * @param $connect 更具id更新商品
 */
function updateRow($connect)
{
    $sql = "UPDATE product SET productName = '{$_POST['productName']}',productImg='{$_POST['productImg']}',productPrice='{$_POST['productPrice']}',productTip='{$_POST['productTip']}' WHERE id = {$_POST['productId']}";
    $result = $connect->sel4Sql($sql);
    if ($result == 1) {
        $result = array('code' => 200, 'msg' => '更新成功');
        echo json_encode($result);
    }

}

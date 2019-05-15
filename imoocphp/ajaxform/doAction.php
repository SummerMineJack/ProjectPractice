<?php
/**
 * Created by PhpStorm.
 * User: Summer
 * Date: 2019/5/15
 * Time: 20:49
 */

require_once '../../login/MysqlConntect.php';
$connect = mysqlConntect::getInstance();
$action = $_GET['action'];
switch ($action) {
    case "init_table":
        initTable($connect);
        break;
    case "add_row":
        break;
    case "del_row":
        break;
    case "update_row":
        break;
}
/**
 * @param $connect 查询初始化table
 */
function initTable($connect)
{
    $sql = "select * from product";
    $result = executeSql($connect,$sql);
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_array()) {
            $rows[] = $row;
        }
        $result = array('code' => 200, 'msg' => '成功', 'data' => $rows);
        echo json_encode($result);
    }
}

function addRow()
{
    $sql = "INSERT product VALUES(0,'$proName','$proPrice','$proTip','$proImg');";
}

function executeSql($sql, $connect)
{
    return $connect->sel4Sql($sql);
}

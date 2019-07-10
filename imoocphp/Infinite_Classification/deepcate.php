<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/10
 * Time: 14:12
 */
include_once '../../login/MysqlConntect.php';

function getList($pid = 0, &$res = array(), $spac = 0)
{
    $spac = $spac + 2;
    $sql = "select * from deepcate where  pid =$pid";
    $connect = mysqlConntect::getInstance();
    $result = $connect->sel4Sql($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $row['catename'] = str_repeat("&nbsp;&nbsp;", $spac) . "|--" . $row['catename'];
        $res[] = $row;
        getList($row['id'], $res, $spac);
    }
    return $res;
}

function getListLink($cid = 0, &$res = array())
{
    $sql = "select * from deepcate where  id =$cid";
    $connect = mysqlConntect::getInstance();
    $result = $connect->sel4Sql($sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $res[] = $row;
        getListLink($row['pid'], $res);
    }
    krsort($res);
    return $res;
}

function desplayListLink($cid)
{
    $str = '';
    $res = getListLink($cid);
    foreach ($res as $key => $val) {
        $str .= "<a href='{$val["id"]}'> {$val['catename']}</a> >";
    }
    return $str;
}

echo desplayListLink(10);

function desplayList($pid)
{
    $str = "";
    $resa = getList($pid);
    $str .= "<select name='cate'";
    foreach ($resa as $key => $val) {
        $str .= "<option>{$val['catename']}</option>";
    }
    return $str .= "</select>";
}



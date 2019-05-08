<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/8
 * Time: 10:10
 */
header("content-type=text/html;charset=utf-8");
require "findMaxValues.php";
$maxValues = new findMaxValues();
$array_values = array(100, 2, 31, 444, 23321, 432, 53, 532, 2343);
$array_valuess = array(11231300, 1231232, 31231213, 44412312, 2331231231221, 43112312, 12353, 5312332, 1132343);
$datstr;
switch (date("w")) {
    case 0:
        $datstr = "日";
        break;
    case 1:
        $datstr = "一";
        break;
    case 2:
        $datstr = "二";
        break;
    case 3:
        $datstr = "三";
        break;
    case 4:
        $datstr = "四";
        break;
    case 5:
        $datstr = "五";
        break;
    case 6:
        $datstr = "六";
        break;
}

echo date("Y年m月d日 H:i:s" . " 星期" . $datstr . date("W"), "1557283160"),'<br>';
$birthday = mktime(0, 0, 0, 3, 1, 1995);
$currentTime = time();
$diffTime = $currentTime - $birthday;
echo floor($diffTime / (24 * 3600)),'<br>';
<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/26
 * Time: 16:43
 */
$intTest = 123123123;
//Validate过滤器适用于 正则，验证用户输入，是否匹配输入
//Sanitizing过滤器适用于 禁止用户输入某字符，无数据格式规则，始终返回字符串
if (!filter_var($intTest, FILTER_VALIDATE_INT)) {
    echo "不是一个合法的整数";
} else {
    echo "是一个合法的整数";
}

$number = "5-2+3pp";
var_dump(filter_var($number, FILTER_SANITIZE_NUMBER_INT));

//过滤多种输入
$filterArray = array(
    "name" => array(
        "filter" => FILTER_SANITIZE_STRING
    ),
    "age" => array(
        "filter" => FILTER_VALIDATE_INT, "option" => array("minAge" => 1, "maxAge" => 120)
    ),
    "email" => array(
        "filter" => FILTER_VALIDATE_URL
    ),
);
$filterResult = filter_input_array(INPUT_GET, $filterArray);
if (!$filterResult['age']) {
    echo "年龄必须在1到120之间" . "<br>";
} else if (!$filterResult['email']) {
    echo "Email不合法" . "<br>";
} else {
    echo "输入正确" . "<br>";
}
//判断一个数值是否在一个区间内
$inta = 2;
$intmax = 200;
$intmin = 1;
if (!filter_var($inta, FILTER_VALIDATE_INT, array("options" => array("min_rang" => $intmin, "max_range" => $intmax)))) {
    echo "变量inta的值不再范围内" . "<br>";
} else {
    echo "变量inta的值在范围内" . "<br>";
}
//检测ipv6地址
$ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";
if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
    echo "$ip 不是一个ipv6地址";
} else {
    echo "$ip 是一个ipv6地址";
}
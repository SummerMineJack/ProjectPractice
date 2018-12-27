<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/27
 * Time: 9:37
 */
//强制模式
function sunms(int ...$ints) {
    return array_sum($ints);
}

echo sunms(2, '9', 1.9);
// 严格模式
/*declare(strict_types=1);
function sum(int ...$ints) {
    return array_sum($ints);
}

print(sum(2, '3', 4.1));*/
$site = $_POST['name'] ?? "测试";
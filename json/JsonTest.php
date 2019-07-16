<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/26
 * Time: 17:13
 */
//将数组转换成json
$arrays = array("a" => 1, "b" => 2, "c" => 3, "d" => 4, "e" => 5);
//echo json_encode($arrays);
//将对象转换成json
class User {
    var $userName;
    var $userId;
    var $userNickName;
    var $userPhoneNumber;
}
$users = new User();
$users->userName = "HuangJian";
$users->userId = "97603";
$users->userNickName = "SummerMineJack";
$users->userPhoneNumber = "15871490754";
$jsonEncode = json_encode($users);
echo  $jsonEncode;
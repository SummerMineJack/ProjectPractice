<?php

require_once "Reponse.php";
require_once "../Smarty/html/SmartyConn.php";
require "UserBean.php";


$connect = new mysqlConntect();
$connect->conntct();


/*
* 首页接口
* http://domain/hotgirl/callback.php?format=xml/json
*/
$result = $connect->selAll();
while ($row = mysqli_fetch_row($result)) {
    $userbean = new UserBean();
    $userbean->userId = $row[0];
    $userbean->userName = $row[1];
    $userbean->userPassword = $row[2];
    $userbean->userEmail = $row[3];
    $userbean->token=md5($userbean->userName.$userbean->userPassword."ceshi");
    $rows[] = $userbean;
}
if (!empty($rows)) {
    return Response::api_response(200, 'Success', $rows);
} else {
    return Response::api_response(403, 'No result from database');
}
<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/27
 * Time: 13:44
 */
require_once "MysqlConntect.php";
$mysql = new mysqlConntect();
$mysql->conntct();

$username = $_POST['UserName'];
$userpdw = $_POST['UserPassword'];
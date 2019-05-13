<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/9
 * Time: 10:44
 */
require_once 'verifycodes.php';
session_start();
$_SESSION['verifycode'] = genrateverifys();
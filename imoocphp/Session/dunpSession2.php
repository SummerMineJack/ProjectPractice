<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/9
 * Time: 15:31
 */
require_once 'SessionUtil.php';
$sessionUtils = new SessionUtil();
ini_set('session.save_handler', 'user');
session_set_save_handler($sessionUtils, true);
session_start();
print_r($_SESSION);
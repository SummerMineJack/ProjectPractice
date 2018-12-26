<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/25
 * Time: 14:41
 */
include 'UserBean.php';
$bean = new UserBean();
$bean->setUserId(1);
$bean->setUserName("HuangJian");
$bean->setUserAdress("ShangHai");
echo $bean->getUserId();
<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/9
 * Time: 10:44
 */
//require_once 'verifycodes.php';
//session_start();
//$_SESSION['verifycode'] = genrateverifys();

require_once 'VerifyCodeUtil.class.php';
$config=array('fontsfile'=>'C:/Windows/Fonts/simkai.TTF');
$verifyCodeUtil=new VerifyCodeUtil($config);
$verifyCodeUtil->getVerifyCode();
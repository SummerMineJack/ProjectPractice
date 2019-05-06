<?php
require './libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('username', "");
$smarty->display('./html/login.html');
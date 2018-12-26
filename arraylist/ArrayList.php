<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/26
 * Time: 10:14
 */
$arrays = array(
    "RNG" => array("LPL", "Royal Never Giveup"),
    "ENG" => array("LPL", "EDward Gaming"),
    "TOP" => array("LPL", "Topsports Gaming"),
    "SNG" => array("LPL", "SuNing Gaming"),
    "IG" => array("LPL", "Invictus Gaming")
);
print "<pre>";
print_r($arrays);
print "</pre>";
echo $arrays['RNG'][0] . "内容是" . $arrays['RNG'][1];
print"<br>";
date_default_timezone_set("Asia/Shanghai");
echo date("Y-m-d H:i:sa");
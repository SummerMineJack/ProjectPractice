<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/18
 * Time: 10:00
 */
require_once "phpqrcode/qrlib.php";

$content="BEGIN:VCARD"."\n";
$content.="VERSION:2.1"."\n";
$content.="N:黄"."\n";
$content.="FN:俭"."\n";
$content.="ORG:Juyan"."\n";
$content.="TEL;TYPE=Cel:15871490754"."\n";
$content.="EMAIL:hjzxzone@163.com";
$content.="END:VCARD"."\n";
QRcode::png($content);
<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/10
 * Time: 13:43
 */
$fileName=$_GET['filename'];
header('content-disposition:attachment;filename='.basename($fileName));
header('content-length:'.filesize($fileName));
readfile($fileName);
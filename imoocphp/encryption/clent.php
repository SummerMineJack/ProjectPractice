<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/16
 * Time: 14:42
 */

$public = "-----BEGIN PUBLIC KEY-----
MIGeMA0GCSqGSIb3DQEBAQUAA4GMADCBiAKBgGI+ScjUf2RA2a1V6wgOAkixj/lk
uKKZ6cUAzj6H0YHu8Jrn4s6E/ZKmHiXs6zAl/XYF1ad60Zfjnjp3a553LJYMPW2h
MLFdFF5zkB03VAjVCH5bhYLe7F1BDfRITVrI6kurFse0q8mEXGDMubywxnDmQL7+
5W0Ya98fTRMAaHxFAgMBAAE=
-----END PUBLIC KEY-----";
$appkey = "JSjkawhq2wq";
$secretKey = "skjkqoooJSJIAWidhi12";
$url = "http://www.huangjian.com/imoocphp/encryption/server.php?";

$params['appkey'] = $appkey;
$params['orderId'] = 1;
$params['username'] = 'HuangJian';
$params['password'] = '123456';
$params['time'] = time();//用于请求地址的时效

$queryString = http_build_query($params);
//生成签名
$sign = getSign($params, $secretKey);
//拼接请求地址字符串
$queryString .= "&sign=" . $sign;
//对请求地址进行加密
$encrypt = "";
openssl_public_encrypt($queryString, $encrypt, $public);
$encrypt = urlencode($encrypt);
$url .= "q=" . $encrypt;
print_r($url);

function getSign($params, $secretKey)
{
    //首先将客户端传过来的值进行排序，确保生成的签名与后台进行一致
    ksort($params);
    //重新链接字符串
    $newParams = http_build_query($params);
    $newParams .= $secretKey;
    return md5($newParams);
}

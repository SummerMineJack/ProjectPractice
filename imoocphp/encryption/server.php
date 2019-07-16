<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/16
 * Time: 14:42
 */
$private = "-----BEGIN RSA PRIVATE KEY-----
MIICWwIBAAKBgGI+ScjUf2RA2a1V6wgOAkixj/lkuKKZ6cUAzj6H0YHu8Jrn4s6E
/ZKmHiXs6zAl/XYF1ad60Zfjnjp3a553LJYMPW2hMLFdFF5zkB03VAjVCH5bhYLe
7F1BDfRITVrI6kurFse0q8mEXGDMubywxnDmQL7+5W0Ya98fTRMAaHxFAgMBAAEC
gYAqwqvA0uTj0Oot7OCQr/BEjax5w2Itu8opKhGa2+jPoh1tfxKUCwSHiPBEV5uC
aHaqoR1+eRGzB6p+Di50WbC4zob8g+fZAcguMT8Dq5efTS9lGIq8QbUh493Kp8CK
Q4xNCj3b/sw5WYiTSMB132yp/K+986VvGqMKiJ7WhSYE3QJBALsbq6HCelog7KoZ
8/CiUhxeeSVZt924j3pp17NvDWafFlf6D5SSqMYqxYOPkRj8+Pp38N8igAIb5jvW
IDobYk8CQQCGanOYxqa2Z7FHP1qtAHd4X3mV6dcwLkm9663kofmYsVDak1D05snD
cc/4/z+LYRlsq7sTlqOH5LcnGk1tUDcrAkBdz/rW6OZlqBphExAe95PJy4hcNMae
cXnmu4i925FRgbQ3OhZzvLDIYwuS8fmjGLtRAbAQgIDEDe7601pnJ/G7AkBasmeP
lbMV7z+6gHAxvdffPCTxV9jgZMtTQDyUwgqF0ldpNO/yX+uSWjBnpet9o6YhIntX
y1RKtLQ0yVWnRfIDAkEArOjkTrTTc94iDp9Qck6l75IuxEFybga/+Y1My/ESzlG/
hGwGvP3QkIIqy3YQ7Kj8dYVSXrx5HTddD/JasVbgeA==
-----END RSA PRIVATE KEY-----";
//拿到请求地址里的q参数
$q=$_GET['q'];
$params=[];
$decrypt="";
openssl_private_decrypt($q,$decrypt,$private);
parse_str($decrypt,$params);
//校验签名
$sign = getSign($params);
//将从客户端传递过来的值首先取出sign，然后进行生成sign，与刚取出的sign进行比对
if ($sign != $params['sign']) {
    echo "非法请求";
}
echo "请求成功";
function getSign($params)
{
    //针对客户端的唯一性的appkey和secretKey进行匹配
    $conf = ["JSjkawhq2wq" => "skjkqoooJSJIAWidhi12"];
    //判断参数里的时间与请求到服务端的时间差是否大于等于10秒，如果是，那么就是非法的请求
    if (abs($params['time'] - time() >= 10)) {
        echo "非法请求";
    }
    //然后将传递过来的值里面的签名先取出
    unset($params['sign']);
    //重新对传递过来的值进行排序
    ksort($params);
    //再次生成字符串
    $paramsString = http_build_query($params);
    //返回签名密钥
    return md5($paramsString . $conf[$params['appkey']]);
}
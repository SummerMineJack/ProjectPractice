<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/16
 * Time: 13:35
 */
$data = "this is my way"; //需要加密的内容
$key = md5(uniqid()); //生成唯一字符串作为密钥
$VI = substr($key, 0, 16);
$method = "AES-128-CBC";//加密算法名 使用 openssl_get_cipher_methods() 进行选择加密算法
$encryptionResult = openssl_encrypt($data, $method, $key, OPENSSL_RAW_DATA, $VI);
//echo "加密后结果：" . $encryptionResult . "<br/>";
$decryptionResult = openssl_decrypt($encryptionResult, $method, $key, OPENSSL_RAW_DATA, $VI);
//echo "解密后结果：" . $decryptionResult . "<br/>";

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

$public = "-----BEGIN PUBLIC KEY-----
MIGeMA0GCSqGSIb3DQEBAQUAA4GMADCBiAKBgGI+ScjUf2RA2a1V6wgOAkixj/lk
uKKZ6cUAzj6H0YHu8Jrn4s6E/ZKmHiXs6zAl/XYF1ad60Zfjnjp3a553LJYMPW2h
MLFdFF5zkB03VAjVCH5bhYLe7F1BDfRITVrI6kurFse0q8mEXGDMubywxnDmQL7+
5W0Ya98fTRMAaHxFAgMBAAE=
-----END PUBLIC KEY-----";

$content = "this is my way";

$encrypt = "";
openssl_public_encrypt($content, $encrypt, $public);
var_dump($encrypt);

$decrypt = "";
openssl_private_decrypt($encrypt, $decrypt, $private);
var_dump($decrypt);
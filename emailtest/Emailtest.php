<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/26
 * Time: 14:14
 */
$to = $_POST['ReceiveEmail'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$from = "hjzxzone@163.com";   // 邮件发送者
$headers = "From:" . $from;         // 头部信息设置
ini_set('SMTP','smtp.163.com');
ini_set('smtp_port',25);
ini_set('sendmail_from','hjzxzone@163.com');
mail($to, $subject, $message, $headers);
echo "邮件已发送";

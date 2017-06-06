# aliyunmail

AliyunMail，阿里云dm邮件推送composer包

阿里云邮件推送
https://www.aliyun.com/product/directmail?spm=5176.7960203.237031.125.XvOKi2

使用方法
```
use Rainwsy\Aliyunmail\Send\Single;
use Rainwsy\Aliyunmail\Auth;
$AccessKeyId = '';
$AccessSecret = '';
$auth = Auth::config($AccessKeyId, $AccessSecret);
$mail = new Single();
$mail->setAccountName('发件人地址');
$mail->setFromAlias('发件人姓名');
$mail->setReplyToAddress('true');
$mail->setAddressType('1');
$mail->setToAddress('收件人地址');

$mail->setSubject('邮件主题');
$mail->setHtmlBody('邮件正文');

$send = $mail->send();

print_r($send);
```
<?php
date_default_timezone_set('GMT');  //设置默认时区
$appid = "LTAIQ4tsbfsM2ur2";
$secret = "";
$TemplateCode = 'SMS_142389494';

$params = [
	//-------系统参数---------
	'AccessKeyId' => $appid,
	'Timestamp'   => date('Y-m-d\TH:i:s\Z'),
     'Format'     => 'JSON',
	 'SignatureMethod' => 'HMAC-SHA1',
	 'SignatureVersion' => '1.0',
	 'SignatureNonce' => uniqid(),
	// 'Signature'     => '',   //签名

	 //-----业务参数----------------
	 'Action'    => 'SendSms',
	 'Version'   => '2017-05-25',
	 'RegionId'  => 'cn-hangzhou',
	'PhoneNumbers' => '18811015437',  //手机号
	'SignName' => '张文龙',   //签名
	'TemplateCode' => $TemplateCode, // 模板id
	'TemplateParam' => json_encode(['code' => 'zwldx5']), //模板替换变量  验证码
];

ksort($params);

$str = '';
foreach($params as $k => $v){
	$str .= urlencode($k) . '=' . urlencode($v) . '&';
}
echo '<hr>';
 $str = substr($str,0,-1);

$str = str_replace(['+','*','%7E'],['%20','%2A','~'],$str);

$POPSTR = 'GET' . '&' . urlencode('/') . '&' . urlencode($str);

//echo $POPSTR;

$sign = urlencode(base64_encode( hash_hmac('sha1',$POPSTR,$secret . '&',true)));

echo $url = 'http://dysmsapi.aliyuncs.com/?Signature=' . $sign . '&' . $str;

echo '<a href="' . $url . '" > 发送</a>';
?>

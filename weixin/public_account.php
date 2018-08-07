<?php
include '../public/utils.php';
$str = file_get_contents('php://input');
// file_put_contents('./info.log',$str."\r\n",FILE_APPEND);
$arr = XmlToArr($str);
file_put_contents('./info.log',print_r($arr,true) ."\r\n",FILE_APPEND);

//百度翻译接口
$appId = '20180723000187986';
$secret = 'xJ_J8ihT1GxEDXYX5Z_Q';
$q=$arr['Content'];
$from='auto';
$to='en';
$salt=rand(1,10000);
$sign = md5($appId.$q.$salt.$secret);
$url = 'https://fanyi-api.baidu.com/api/trans/vip/translate?q='.urlencode($q).'&from='.$from.
'&to='.$to.'&appid='.$appId.'&salt='.$salt.'&sign='.$sign;
$res_arr = json_decode(file_get_contents($url),true);
// file_put_contents('./info.log',print_r($str,true) ."\r\n",FILE_APPEND);
// file_put_contents('./info.log',print_r($url,true) ."\r\n",FILE_APPEND);
$rep = [
    'ToUserName'=>$arr['FromUserName'],
    'FromUserName'=>$arr['ToUserName'],
    'CreateTime' => time(),
    'MsgType' => 'text',
    'Content' => '祝你天天开心,翻译结果为:'.$res_arr['trans_result'][0]['dst']
    // 'Content' => '祝你天天开心,翻译结果为:'.print_r($url,true)
    // 'Content' => '祝你天天开心,翻译结果为:'.print_r($res_arr,true)
];

echo ArrToXml($rep);
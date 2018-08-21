<?php 
ini_set('display_errors','on');
error_reporting(E_ALL);
include('base.php');
class WeiXinPay extends Base
{
    public function __construct(){
        $arr = [
            'appid' => 'abcd',
            'mch_id' => 'efgh',
            'body' => 'ijkl'
        ];
        echo '<pre>';
        // print_r($this->setSign($arr));
        $arr = $this->setSign($arr);
        if($this->chkSign($arr)){
            echo '验证签名成功';
        }else{
            echo '验证签名失败';
        }
    }
}

$obj = new WeiXinPay;
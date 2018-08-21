<?php

class Base
{
    const KEY = 'aaaaaaaaaaaaaa';//商户id
    /**
     * 生成签名
     */

    public function getSign($arr){

        //去除空值
        $arr = array_filter($arr);

        //如果数组里有签名，则去除
        if(isset($arr['sign'])){
            unset($arr['sign']);
        }

        //按照键名字典排序
        ksort($arr);

        //生成url查询字符串
        $str = $this->arrToUrl($arr).'&key='.self::KEY;
        $str = strtoupper(md5($str));
        return $str;
    }
    /**
     * 验证签名
     */
    public function chkSign($arr){
        $sign = $this->getSign($arr);
        if($sign == $arr['sign']){
            return true;
        }else{
            return false;
        }
    }
     
    /**
     * 给数组添加签名
     * 
     */
    public function setSign($arr){
        $arr['sign'] = $this->getSign($arr);
        return $arr;
    }
     
     
     /**
      *   数组转Url
      */
    public function arrToUrl($arr){
        return  urldecode(http_build_query($arr));
    }
}
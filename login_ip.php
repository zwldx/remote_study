<?php

// //源数组，模拟数据库
// $source_arr = array(
//     array('zhangsan','211.64.32.1','2012-01-01 10:10:10'),
//     array('lisi','212.65.31.2','2012-01-01 10:12:11'),
//     array('zhangsan','211.64.32.1','2012-01-01 13:12:34'),
//     array('zhangsan','77.64.32.23','2012-01-02 10:10:10'),
//     array('lisi','58.82.132.7','2012-01-03 21:01:45'),
//     array('lisi','212.65.31.2','2012-01-05 10:10:10')    
// );
//目标
// zhangsan 在IP 211.64.32.1 上登录过2次
// zhangsan 在IP 77.64.32.23 上登录过1次
// lisi     在IP 212.65.31.2 上登录过2次
// lisi     在IP 58.82.132.7 上登录过1次
//数组格式
// $arr =[
//     'zhangsan'=> [
//         ['211.64.32.1'=>2],
//         ['77.64.32.23'=> 1],
//     ],
//     'lisi'=>[
//         ['212.65.31.2'=>2],
//         ['58.82.132.7'=>1],
//     ]
// ];


//结果数组
// $result_arr = [];
// foreach($source_arr as $v){
//     if(!isset($result_arr[$v[0]])){
//         if(!isset($result_arr[$v[1]])){
//             $result_arr[$v[0][$v[1]]]=1;
//         }else{
//             $result_arr[$v[0][$v[1]]]=1;
//         }
//     }else{
//         $result_arr[$v[0][$v[1]]]++;
//     }
// }
// $arr =[
//     'zhangsan'=> [
//         ['211.64.32.1'=>2],
//         ['77.64.32.23'=> 1],
//     ],
//     'lisi'=>[
//         ['212.65.31.2'=>2],
//         ['58.82.132.7'=>1],
//     ]
// ];
//源数组，模拟数据库
$source_arr = array(
    array('zhangsan','211.64.32.1','2012-01-01 10:10:10'),
    array('lisi','212.65.31.2','2012-01-01 10:12:11'),
    array('zhangsan','211.64.32.1','2012-01-01 13:12:34'),
    array('zhangsan','77.64.32.23','2012-01-02 10:10:10'),
    array('lisi','58.82.132.7','2012-01-03 21:01:45'),
    array('lisi','212.65.31.2','2012-01-05 10:10:10')    
);
$result_arr = [];
foreach($source_arr as $v){
    if(isset($result_arr[$v[0]]) && isset($result_arr[$v[0]][$v[1]])){       
        $result_arr[$v[0]][$v[1]]++;
    }else{
        $result_arr[$v[0]][$v[1]] = 1;
    }
}

// print_r($result_arr);
$str = '';
foreach($result_arr as $k => $v){
    foreach($v as $k2 => $v2){
        $str.="{$k}在ip";
        $str.="{$k2}上登录{$v2}次\r\n<br>";
    }
}
echo $str;
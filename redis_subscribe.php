<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
$r = new \Redis;
$is_ok = $r->connect('140.143.64.219',6379);
$r->setOption(Redis::OPT_READ_TIMEOUT, -1);
$key = 'news';
$r->subscribe(array($key),'callback');
// echo 1;
function callback($redis, $channel, $msg){
    
    echo str_repeat(' ',64*10024);//防止缓存必备，输出一些空字符，防止服务器缓存
    var_dump($redis);
    echo $channel;
    echo $msg;
    //注意此处应该清缓存，并且nginx.conf文件的 gzip 为off; 
    flush();
    return true;
}
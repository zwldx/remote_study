<?php

$re = new \Redis;
$re->connect('140.143.64.219',6379);
$ch = 'news';
$value = 'wahaha';
$re->publish($ch,$value);
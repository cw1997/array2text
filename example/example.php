<?php

$arr[0]['id'] = 1;
$arr[0]['title'] = '一';
$arr[0]['author'] = 'h';
$arr[1]['id'] = 22;
$arr[1]['title'] = '二二';
$arr[1]['author'] = 'hh';
$arr[2]['id'] = 333; // 13
$arr[2]['title'] = '三三三'; // 12
$arr[2]['author'] = 'hhh'; // 10
$arr[1]['id'] = 1997;
$arr[1]['title'] = '一个数组转文本的小工具';
$arr[1]['author'] = '昌维changwei';

require_once __DIR__ . './../vendor/autoload.php';

$ret = Changwei\Array2Text::array2text($arr);
echo $ret;
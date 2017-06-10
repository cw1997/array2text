<?php
/**
 * array2text example file
 * @author 昌维[867597730@qq.com]
 * @package Changwei
 * @website https://github.com/cw1997/array2text
 * @date:2017-06-10 20:19:46
 */
$arr[0]['id'] = 1;
$arr[0]['title'] = '一';
$arr[0]['author'] = 'h';
$arr[1]['id'] = 1997;
$arr[1]['title'] = '一个数组转文本的小工具';
$arr[1]['author'] = '昌维changwei';
$arr[2]['id'] = 333; // 13
$arr[2]['title'] = '三三三'; // 12
$arr[2]['author'] = 'hhh'; // 10

$composer_require_path = __DIR__ . './../../../autoload.php';
$composer_install_path = __DIR__ . './../vendor/autoload.php';
is_file($composer_require_path) ? require_once($composer_require_path = __DIR__ . './../../../autoload.php') : require_once($composer_install_path);

$ret = Changwei\Array2Text::array2text($arr);
echo $ret;
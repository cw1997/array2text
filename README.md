# array2text
convert a php associative array to a text

一个将PHP关联数组转换为文本形式表格的小工具

# example
![](https://github.com/cw1997/array2text/blob/master/array2text.png?raw=true)

input:


    $arr[0]['id'] = 1;
    $arr[0]['title'] = '一';
    $arr[0]['author'] = 'h';
    $arr[1]['id'] = 1997;
    $arr[1]['title'] = '一个数组转文本的小工具';
    $arr[1]['author'] = '昌维changwei';
    $arr[2]['id'] = 333; // 13
    $arr[2]['title'] = '三三三'; // 12
    $arr[2]['author'] = 'hhh'; // 10


output:


    Administrator@changwei MINGW64 /d/www/array2text/example
    $ php example.php
    +------+------------------------+--------------+
    | id   | title                  | author       |
    +------+------------------------+--------------+
    | 1    | 一                     | h            |
    +------+------------------------+--------------+
    | 1997 | 一个数组转文本的小工具 | 昌维changwei |
    +------+------------------------+--------------+
    | 333  | 三三三                 | hhh          |
    +------+------------------------+--------------+

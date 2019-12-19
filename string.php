<?php
//string统计字符串出行的次数

//one.自定义函数 可以反转数字英文，反转中文乱码
header("content-type:text/html;chartset=utf-8");

$str = 'AbCdEfGaBcDeFgH0234;,!-AaBbCcDdEeFfGg';

$str = strtoupper($str);          // 不区分大小写时,全部转换成大写或者小写

// 方法一
$res = array();                   // 定义一个结果集空数组
$arr = str_split($str);           // 将字符串转换成数组
$res = array_count_values($arr);  // 统计数组中各个值出现的次数
var_dump($res);

$str=' yauiopajaql';
echo substr_count($str,'a');


$str1 = 'yabadabadoo';
$str2 = 'yaba';
if (strpos($str1,$str2)) {  
    echo "\"" . $str1 . "\" contains \"" . $str2 . "\"";
} else {
    echo "\"" . $str1 . "\" does not contain \"" . $str2 . "\"";
}

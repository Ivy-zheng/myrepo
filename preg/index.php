<?php
$p = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+([a-z0-9-]+)*(\.[a-z]{2,})/";
$p1 = "/^[\w-_]+([\w-_]+)*@[\w-]+([\w-]+)*(\.[a-z]{2,})/";


$pp = "/^\w+([+-.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
$pp = '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/';
$email = file("email.log");
$p = "/^[\w-_]+([\w-_]+)*@(sina.com)+/";
//$p = "/^[\w\.]+@[\w]+(\.[a-zA-Z]+){1,3}$/";
// $arr = explode("\n", $str);
// var_dump($arr);
var_dump($email);
$newarr = preg_grep($p,$email);
var_dump($newarr);


$p = "/<(.*)>.*<\/\1>|<(.*)\/>/";

// $arr = [];
// //模式分隔符后的"i"标记这是一个大小写不敏感的搜索
// if (preg_match("/php/i", "PHP is the web scripting language of choice.",$arr)) {
//     echo "查找到匹配的字符串 php。";
//     var_dump($arr);
// } else {
//     echo "未发现匹配的字符串 php。";
// }

// // 从URL中获取主机名称
// preg_match('@^(?:http://)?([^/]+)@i',
//     "http://www.runoob.com/index.html", $matches);
// $host = $matches[1];
// var_dump($matches);

// $array = array(1, 2, 3.4, 53, 7.9,0.66,77777.99);
// // 返回所有包含浮点数的元素
// $fl_array = preg_grep("/^\d+\.\d+$/", $array);
// print_r($fl_array);
$pp = "/<(.*)>.*<\/\1>|<(.*)\/>/";

// $string = 'google 123, 456';
// $pattern = '/(\w+) (\d+), (\d+)/i';
// $replacement = 'runoob ${2},$3';
// echo preg_replace($pattern, $replacement, $string);

//$p = "/^(\w+)@(\w+)\.com$/";
// $p= "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+([a-z0-9-]+)*(\.[a-z]{2,})$/";
// $str = '297223@qq.com  nihshdlah  f3333@hotmail.comkkkk';
// preg_match_all($p,$str,$matches);
// var_dump($matches);
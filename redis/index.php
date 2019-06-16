<?php

$redis = new Redis();
$redis->connect('127.0.0.1',6379);
//string
// $redis->set('key1',1);
// $redis->set('key2','udhsaudsa');
// var_dump($redis->get('key1'));
// var_dump($redis->get('key2'));
//list
// $redis->lpush('list1','l1');
// $redis->lpush('list1','22');
// $redis->lpush('list1','33');
// echo $redis->llen('list1');
// var_dump($redis->lpop('list1'));
// var_dump($redis->rpop('list1'));
// //set
$redis->sadd('s1',1);
$redis->sadd('s1',2);
$redis->sadd('s1',3);
$redis->sadd('s1',4);
var_dump($redis->scard('s1'));
var_dump($redis->smembers('s1'));


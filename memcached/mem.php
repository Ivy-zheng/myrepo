<?php
/**
 * 简单的存储实现
 * @var Memcache
 */
$memcache = new Memcache;
$memcache->connect("127.0.0.1",11211);
echo "Memcached's version: " . $memcache->getVersion() . "<br />";
$data = array(
           'url' => "http://www.cnblogs.com/wujuntian/",
           'name' => "编程人，在天涯"
);
$memcache -> set("info",$data,0,10);
$info = $memcache->get("info");
echo '<pre>';
//print_r($info);
debug_print_backtrace();
debug_zval_dump($info);
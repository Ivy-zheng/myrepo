<?php

require 'memcached.class.php';

$mem = new Memcache();
$mem->connect('127.0.0.1', 11211);

$memclass = new MemcacheSession();
$memclass->start($mem);

echo '<pre>';
print_r($_SESSION);
echo session_id();
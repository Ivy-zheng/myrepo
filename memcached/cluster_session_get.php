<?php

require 'memcached.class.php';

ini_set('session.save_path', 'tcp://127.0.0.1:11211,tcp://127.0.0.1:11212');
ini_set('memcache.hash_strategy', 'consistent');
ini_set('memcache.hash_function','crc32');

$mem = new Memcache();
$mem->addServer("127.0.0.1",11211) or die ("Could not add server 11211");  
$mem->addServer("127.0.0.1",11212) or die ("Could not add server 11212");  

$memclass = new MemcacheSession();
$memclass->start($mem);

echo session_id(); 

echo '<pre>';
print_r($_SESSION);
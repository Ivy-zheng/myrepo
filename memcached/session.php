<?php
/**
 * 调用Memcached 存储 Session类
 */
header('Content-type:text/html; charset=utf-8');

require 'memcached.class.php';

$mem = new Memcache();
$mem->connect('127.0.0.1', 11211);

$memclass = new MemcacheSession();
$memclass->start($mem);

$_SESSION['username'] = 'dee';
$_SESSION['username1'] = 'dee1';

$memclass->write('memwrite','writedata');
var_dump($mem->get('memwrite'));

echo '<a href="get.php" target="_blank">跳转</a>';

echo '<pre>'; 
print_r($_SESSION); 
echo session_id(),'<br />';

// class MemcahceSessionHandler{
// 	private $lifetime = 0;
// 	private $mc = null;

// 	public function start()
// 	{
// 			if(!session_set_save_handler(
// 				array(&$this,'open'),
// 				array(&$this,'close'),
// 				array(&$this,'read'),
// 				array(&$this,'write'),
// 				array(&$this,'destroy'),
// 				array(&$this,'gc') ))
// 				return false ;
// 			session_start();
// 	}

// 	public function __construct(){}
// 	public function __destruct(){
// 		session_write_close();
// 	}

// 	public function open()
// 	{
// 		$this->lifetime = ini_get('session.gc_maxlifetime');
// 		self::$mc = new Memcache;
// 		self::$mc->connect('127.0.0.1');
// 		// $this->mc = Cache::getMc();
// 		return true;
// 	}

// 	public function read($id)
// 	{
// 		return $this->mc->get("sess_{$id}");
// 	}

// 	public function  write($id,$data)
// 	{
// 		return $this->mc->delete("sess_{$id}");
// 	}

// 	public function destory($id)
// 	{
// 		return $this->mc->delete("sess_{$id}");
// 	}


// 	public function gc(){return true;}
// 	public function close(){return true;}
// }


// /* 使用方法*/

// sesion_name($mySessionKey);
// $gc_maxlifetime = 2592000;//30 days
// session_get_cookie_params($gc_maxlifetime);
// ini_set('session.gc_maxlifetime',$gc_maxlifetime);

// $sh = new MemcahceSessionHandler();
// $sh->start();
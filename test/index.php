<?php
//strip_tags();
//htmlentitles();
//html_entity_decode();
//addslashes();
//strip_slashes();
//htmlspecialchars_decode();

// $arr=array(1,43,54,62,21,66,32,78,36,76,39);  
// function getpao(&$arr)
// {  
//   $len=count($arr);
//   //设置一个空数组 用来接收冒出来的泡
//   //该层循环控制 需要冒泡的轮数
//   for($i=1;$i<$len;$i++)
//   { //该层循环用来控制每轮 冒出一个数 需要比较的次数
//     for($k=0;$k<$len-$i;$k++)
//     {
//        if($arr[$k]>$arr[$k+1])
//         {
//             $tmp=$arr[$k+1];
//             $arr[$k+1]=$arr[$k];
//             $arr[$k]=$tmp;
//         }
//     }
//   }
// }
// getpao($arr);

// $arr = [1,99,55,3,8,5,0,32,444];
//  function getMaopao(&$arr)
 
// {
// 	for ($i=1; $i < count($arr); $i++) { 
// 		for ($j=0; $j < count($arr)-$i; $j++) { 
// 			if($arr[$j] < $arr[$j+1]){
// 				$tmp = $arr[$j];
// 				$arr[$j] = $arr[$j+1];
// 				$arr[$j+1] = $tmp;
// 			}
			
// 		}
// 	}
// }
// getMaopao($arr);
// var_dump($arr);

// public class db
// {
// 	private static $_instances;
// 	private function __contruct()
// 	{
// 	}

// 	 public static function getInstances()
// 	{
// 		if(self::_instances == null)
// 		{
// 			self::_instances = new self;
// 		}
// 		return self::_instances;
// 	{
	  
// }

// var_dump((0.1+0.7)*10);
// var_dump((int)(round((0.1+0.7)*10)));
// $a = 1;
// xdebug_debug_zval('a');
// echo PHP_EOL;
// $b = $a;
// xdebug_debug_zval('a');
// echo PHP_EOL;
 
// $c = &$a;
// xdebug_debug_zval('a');
// echo PHP_EOL;
 
// xdebug_debug_zval('b');
// echo PHP_EOL;
 // $array= array('1','1');
 // foreach($array as $k=>$v){
 //      $v= 2;
 // }
 // var_dump($array);

// $a = array( 'meaning' => 'life', 'number' => 42 );
// xdebug_debug_zval( 'a' );
// echo PHP_EOL;
// class Test{
//     public $a = 1;
//     public $b = 2;
     
//     function handle(){
//         echo 'hehe';
//     }
// }
 
// $test = new Test();
// xdebug_debug_zval('test');


// include "b.php"; 
// function foo()
// {    
//   echo 'foo in a'; 
// } 

// foo();



// $count = 5;
// function get_count()
// {
//     static $count = 0;
//     return $count++;
// }
// ++$count;
// get_count();
// echo get_count();

// $referenceTable = array();
// $referenceTable['val1'] = array(1, 2);
// $referenceTable['val2'] = 3;
// $referenceTable['val3'] = array(4, 5);
// $testArray = array();
// $testArray = array_merge($testArray, $referenceTable['val3']);
// var_dump($testArray); 



//  $first = array(1,2); $second = array(3,4); $third = $first+$second; 
//  var_dump($third);

//  $a = array('a','b');
// $b = array('c', 'd');
// $c = $a + $b;
// var_dump($a);
// var_dump(array_merge($a, $b));

// $a = array(0 => 'a', 1 => 'b');
// $b = array(0 => 'c', 1 => 'b');
// $c = $a + $b;
// var_dump($c);
// var_dump(array_merge($a, $b));

// if( '1xuexi' == 1){
//     echo 1;
// }else{
//     echo 2;
// }

// echo 24%(-5);
 // $father="mother"; $mother="son"; echo $$father;
 // echo date('Y-m-d H:i:s', strtotime('-1 days'));
//   $book = 'sssss';//array('a'=>'xiyouji','b'=>'sanguo','c'=>'shuihu','d'=>'hongloumeng');
// $json = json_encode($book);
// echo $json;
// $x = NULL; if ('0xFF' == 255) { echo '255';$x = (int)'0xFF'; } 
// $tt = '-----mmmmm-----';
// $path = 'http://www.runoob.com/php/func-filesystem-pathinfo.html';
// echo $tt,$path.'<br/>';
// // var_dump(pathinfo($path));
// $r = print $tt;
// echo $r;
// print_r(false);
// print_r(null);
// echo '----------------';
// var_dump(false);
// var_dump(null);
// $arr = ['t1'=>'1','t2'=>'a','b','c'];
// $json = json_encode($arr);
// var_dump($json);

// $ip = $_SERVER['REMOTE_ADDR'];
// var_dump($ip);

// $arr = parse_url('http://www.sina.com.cn/abc/de/fg.php?id=1');
// var_dump($arr);
// $result=pathinfo($arr['path']);
// var_dump($result['extension']);


// $uploads_dir = '/uploads';
// foreach ($_FILES["error"] as $key => $error) {
// if ($error == UPLOAD_ERR_OK) {
// $tmp_name = $_FILES["tmp_name"][$key];
// $name = $_FILES["name"][$key];
// move_uploaded_file($tmp_name, "$uploads_dir/$name");
// 
// class db
// {
//   private static $_instance;
//   private function _construct()
//   {

//   }

//   public static function getInstance()
//   {
//   	if(!self::$_instance)
//   	{
//   		$_instance = new self();
//   	}
//   	return $_instance;
//   }
// }

// //定义接口
//   interface IStrategy {
//       function filter($record);
//   }
  
//   //实现接口方式1
//   class FindAfterStrategy implements IStrategy {
//       private $_name;
//       public function __construct($name) {
//         $this->_name = $name;
//     }
//     public function filter($record) {
//         return strcmp ( $this->_name, $record ) <= 0;
//     }
// }

// //实现接口方式2
// class RandomStrategy implements IStrategy {
//     public function filter($record) {
//         return rand ( 0, 1 ) >= 0.5;
//     }
// }

//  //主类
//  class UserList {
//      private $_list = array ();
//      public function __construct($names) {
//          if ($names != null) {
//              foreach ( $names as $name ) {
//                  $this->_list [] = $name;
//              }
//          }
//      }
     
//      public function add($name) {
//          $this->_list [] = $name;
//      }
     
//      public function find($filter) {
//          $recs = array ();
//          foreach ( $this->_list as $user ) {
//              if ($filter->filter ( $user ))
//                  $recs [] = $user;
//          }
//          return $recs;
//      }
//  }
 
//  $ul = new UserList ( array (
//          "Andy",
//          "Jack",
//          "Lori",
//          "Megan" 
//  ) );
//  $f1 = $ul->find ( new FindAfterStrategy ( "J" ) );
//  print_r ( $f1 );
 
//  $f2 = $ul->find ( new RandomStrategy () );
//  print_r ( $f2 ); 

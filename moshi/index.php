<?php

/** 
 * register_shutdown_function,注册一个会在php中止时执行的函数,中止的情况包括发生致命错误、die之后、exit之后、执行完成之后都会调用register_shutdown_function里面的函数 
 * Created by PhpStorm. 
 * User: Administrator 
 * Date: 2017/7/15 
 * Time: 17:41 
 */
  
class Shutdown 
{ 
 public function stop() 
 { 
  echo 'Begin.' . PHP_EOL; 
  // 如果有发生错误（所有的错误，包括致命和非致命）的话，获取最后发生的错误 
  if (error_get_last()) { 
   print_r(error_get_last()); 
  } 
  
  // ToDo:发生致命错误后恢复流程处理 
  
  // 中止后面的所有处理 
  die('Stop.'); 
 } 
} 
  
// 当PHP终止的时候（执行完成或者是遇到致命错误中止的时候）会调用new Shutdown的stop方法 
register_shutdown_function([new Shutdown(), 'stop']); 
  
// 将因为致命错误而中止 
$a = new a(); 
  
// 这一句并没有执行，也没有输出 
echo '必须终止';

// email:
$partten = "/^\w+([+-.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
// var_dump($_SERVER);

// function displayFile($dir)
// {
// 	if(!is_dir($dir)) return $dir;
// 	$files = [];
// 	$handle = opendir($dir) or die('打开路径报错');
// 	while(($file = readdir($handle))!== false)
// 	{
// 		//echo '---------------';
// 		//echo $file;
// 		if($file != '.' && $file != '..')
// 		{
// 			//echo $file;
// 			if(is_dir($dir.'/'.$file))
// 			{
// 				$files[$file] = displayFile($dir.'/'.$file);
// 			}else
// 			{
// 				//echo 2;
// 				$files[] = $dir.'/'.$file;
// 			}
// 		}
// 	}
// 	closedir($handle);
// 	return $files;
// }
// $dir=$_SERVER['DOCUMENT_ROOT'];
// //var_dump($dir);
// var_dump(displayFile($dir));

// public class DuiLie{
// 	private $arr = array();
	$p = "/^\w+([+-.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
	$h = "/<(.*)>.*<\/\1>|<(.*)\/>/";

// 	public function addLeft($val)
// 	{
// 		return array_unshift($this->arr, $var);

// 	}
// 	public function delLeft($val)
// 	{
// 		return array_shift($var);

// 	}
// }
// $ar = array(22,5,78,99,44,666,7);

// function sortArr($arr)
// {
// 	$len = count($arr);
// 	for($i=1;$i<$len;$i++){
// 		for($j = 0;$j<$len-1;$j++)
// 		{
// 			if($arr[$j] > $arr[$i])
// 			{
// 				$tmp = $arr[$j];
// 				$arr[$j] = $arr[$i];
// 				$arr[$i] = $tmp;

// 			}
// 		}
// 	}
// 	return $arr;
// }

// var_dump(sortArr($ar));

// $f1 = 39.8;
// $f2 = 29.8;
// $f = ($f1+$f2)*10;
// var_dump($f);
// var_dump(intval($f1*100));
// var_dump(intval($f2*100));


// $a1 = array('a'=>1,2,'b'=>3,4);
// $a2 = array('a'=>5,'b'=>6,2=>7,8);
// var_dump($a1);
// var_dump($a1+$a2);
// var_dump(array_merge($a1,$a2));
// 
// 
// public class DB
// {
// 	private statis instance = null;

// 	private __contruct(){}

// 	public static getInstance()
// 	{
// 		if(self::instance == null)
// 		{
// 			self::instance = new self();
// 		}
// 		return self::instance;
// 	}
// }


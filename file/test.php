<?php

$url = 'http://www.baidu.com/'; //抓取百度
echo snapshot($url);  //输出结果为图片地址
echo snapshot($url, './baidu.png'); //将图片保存至本地baidu.png, 输出内容图片大小
 
/**
 * 生成网页快照
 * @param   string  $site   目标地址
 * @param   string  $path   保存地址, 为空则不保存
 * @param   integer $dealy  延迟
 * @return  mixed   根据参数返回
 */
function snapshot($site, $path = '', $dealy = 0)
{
	// $url   = 'http://ppt.cc/yo2/catch.php';
	// $query = 'url=' . $site . '&delay=' . $dealy . '&rnd=' . mt_rand(1, 9);
	$ch    = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, true);
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$data = curl_exec($ch);
	curl_close($ch);
 
 
	if (strlen($data) != 32) {
		exit('无效网址');
	}
 
 
	$file = $data{0} . '/' . $data{1} . '/' . $data{2} . '/';
	$file = 'http://cache.ppt.cc/' . $file . 'src_' . $data . '.png';
 
 
	if (!empty($path)) {
		$data = file_get_contents($file);
		return file_put_contents($path, $data);
	}
	return $file;
}

// public class DB()
// {
// 	private static $_instance = null;
// 	private function __construct(){}

// 	public static function getInstance()
// 	{
// 		if(is_null(self::$_instance))
// 		{
// 			self::$_instance = new self();
// 		}
// 		return self::$_instance;
// 	}
// }

// $array = ['a', 'kk'=>'9b', 'c','d','e','zz'=>'f'];
 
// var_dump(in_array('b', $array));      // 返回bool(true)，也就相当于数组中有0	
 
// var_dump(in_array(0, $array, true));      // 返回bool(false)，也就相当于数组中无0		
 
// var_dump(array_search('b', $array));  // 返回int(0)，也就是第一个值的下标
 
// var_dump(array_search(0, $array, true));
// var_dump($array);
// echo '-------------------<br/>';

// $newarr = array_slice($array,0,3);
// // $newarr = array_splice($array,0,3);
// // $newarr = array_splice($array, 0, 3,"maroon"); 
// $newarr = array_chunk($array,1);
// $newarr = rsort($array);
// $newarr=array_sum($array);
// $str = '456klo';
// $newarr = str_split($str,2);
// // var_dump($array);
// var_dump($newarr);

// echo ord('ab');
// echo '<br/>-------------<br/>';
// echo chr(97);




// echo filetype(__DIR__);

// $patten_html = "/<(.*)>.*<\/\1>|<(*.)\/>/";
// $patten_email = "/^\w+([+-.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";

// $arr = [1,99,55,3,8,5,0,32,444];
// function getMaopao($arr)
// {
// 	$len = count($arr);
// 	for ($i=1; $i < $len; $i++) { 
// 		for ($j=0; $j <$len-$i; $j++) { 
// 			if($arr[$j] < $arr[$j+1]){
// 				$tmp = $arr[$j];
// 				$arr[$j] = $arr[$j+1];
// 				$arr[$j+1] = $tmp;
// 			}
			
// 		}
// 	}
// 	return $arr;
// }
// var_dump(getMaopao($arr));

// file_exists(filename)


// if(FALSE)
// {
// 	require "email.php";
// 	echo $ee;
// }

// echo '--------------<br/>'; 
// include("email.php");
// // echo $tt;
// // echo $ee;
// $hdoc = <<<EOT
// hfakhfkasfhas!!!<br/>
// DJSADSA<br/>
// DAJGSDJA<br/>
// DADAS   DAKSHDKSAD
// EOT;
// echo $hdoc;

// $arr = ['hhh','99999','k'=>90];
// $s = serialize($arr);
// var_dump($s);
// var_dump(unserialize($s));

// $url = "https://www.cnblogs.com/igoogleyou/p/heredoc.html";
// $arr  = parse_url($url);
// var_dump($arr);
// $path =pathinfo($arr['path']);
// var_dump($path);
// echo $path['extension'];

// echo 1,3,4;
// echo(print 1);

// $a = 1;
// $b = 2;
// // $a = $a+$b;
// // $b = $a - $b;
// // $a = $a - $b;
// // echo $a,$b;
// echo '<br/>';
// list($a,$b) = array($b,$a);
// echo $a,$b;


// echo $_SERVER["REMOTE_ADDR"];
// echo '<br/>';
// var_dump($_SERVER['HTTP_X_FORWARDED_FOR']);

// 进程是操作系统分配资源的基本单位
// 线程是任务调度和执行的基本单位

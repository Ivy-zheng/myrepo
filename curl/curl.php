<?php

function _get_header($url)
 {
 	$headers = '';
 	if(is_callable('curl_init'))
 	{
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl,CURLOPT_USERAGENT,'User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.0; en-GB; rv:1.9.0.14) Gecko/2009082707 Firefox/3.0.14 (.NET CLR 3.5.30729)');
		// curl_setopt($curl, CURLOPT_VERBOSE,false);
		// curl_setopt($curl,  CURLOPT_VERBOSE, false);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_ENCODING,'gzip,deflate');
		curl_setopt($curl, CURLOPT_AUTOREFERER, true);
		// curl_setopt($curl,CURLOPT_HEADER,1);
		// curl_setopt($curl,CURLOPT_NOBODY,1);
		// curl_setopt($curl,CURLOPT_ENCODING,"gzip, deflate");
		$data=curl_exec($curl);
		// echo 'ERROR<br/>';
		// var_dump(curl_error($curl));
		// echo 'ERROR--END<br/>';
		// $data=curl_exec($curl);
		preg_match('/该网站共有.*>(.*)<\/b>/is',$data,$num);
		$baidunum = $num[1];
		return $data;
		// $baidunum = $num[1];
		// return $data;
		// var_dump($data);
		// echo '-----------------------------<br/>';
		// $source = explode('\r\n', $data);//("\r\n",$data);
		// foreach ($source  as $header) {
		// 	$headers .= $header.'<br/>';
		// 	// $headers .= $header.'<br />';
		// }
		// curl_close($curl);
		// echo $headers;
 	}
 }
// function _get_header($url){
// 	if(function_exists('curl_init')){
// 		$curl = curl_init();
// 		curl_setopt($curl,CURLOPT_URL,$url);
// 		curl_setopt($curl, CURLOPT_USERAGENT, 'User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.0; en-GB; rv:1.9.0.14) Gecko/2009082707 Firefox/3.0.14 (.NET CLR 3.5.30729)');
// 		curl_setopt($curl, CURLOPT_VERBOSE, false);
// 		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// 		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
// 		curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
// 		curl_setopt($curl, CURLOPT_AUTOREFERER, true);
// 		$data=curl_exec($curl);
// 		preg_match('/该网站共有.*>(.*)<\/b>/is',$data,$num);
// 		$baidunum = $num[1];
// 		return $data;
// 	}
// }
//输出
$a = "https://www.baidu.com/s?wd=site%3Abnxb.com&";
echo _get_header($a);
// $a = "https://www.baidu.com/s?wd=site%3Abnxb.com&";
// echo _get_header($a);


// $url = "https://www.bnxb.com";
// echo getHeader($a);
// 获取头信息
 // $url = "http://www.baidu.com";
 // echo getHeader($url);

 // function getHeader($url)
 // {
 // 	$headers = '';
 // 	if(is_callable('curl_init'))
 // 	{
 //        $curl = curl_init();
 //        curl_setopt($curl,CURLOPT_URL,$url);
	// 	curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
	// 	curl_setopt($curl,CURLOPT_HEADER,1);
	// 	curl_setopt($curl,CURLOPT_NOBODY,1);
	// 	curl_setopt($curl,CURLOPT_ENCODING,"gzip, deflate");
	// 	$data=curl_exec($curl);
	// 	// echo 'ERROR<br/>';
	// 	// var_dump(curl_error($curl));
	// 	// echo 'ERROR--END<br/>';
	// 	var_dump($data);
	// 	echo '-----------------------------<br/>';
	// 	$source = explode('\r\n', $data);//("\r\n",$data);
	// 	foreach ($source  as $header) {
	// 		$headers .= $header.'<br/>';
	// 		// $headers .= $header.'<br />';
	// 	}
	// 	curl_close($curl);
	// 	echo $headers;
 // 	}
 // }

// function getHeader($url)
// {
// 	// if(is_callable('curl_init'))
// 	// {
// 		// $ch = curl_init();
// 	// }
// // }
// // 	if(function_exists('curl_init')){
// // 		$curl = curl_init();
// // 		curl_setopt($curl,CURLOPT_URL, $url);
// // 		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
// // 		curl_setopt($curl,CURLOPT_HEADER, 1);
// // 		curl_setopt($curl,CURLOPT_NOBODY, 1);
// // 		curl_setopt($curl, CURLOPT_ENCODING, "gzip, deflate");
// // 		$data=curl_exec($curl);
// // 		$source = explode("\r\n",$data);
// // 		foreach ($source as $header){
// // 			$headers.=$header.'<br />';
// // 		}
// // 		curl_close($curl);
// // 		echo $headers;
// // 	}else{
// // 		$header=get_headers($url);
// // 		foreach ($header as $headers){
// // 		echo $headers."<br />";
// // 		}
// // 	}
// // }

//  $url = 'http://www.baidu.com';

// // $str = file_get_contents($url); 

// // //或者是： 
// //$str = file($url); 
// // var_dump($str);
// //或者是： 
// // readfile($url); 


//  $ch = curl_init();
//  curl_setopt($ch, CURLOPT_URL, $url);
//  //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//  // curl_setopt($ch, CURLOPT_NOBODY, 1);
//  $result = curl_exec($ch);
//  var_dump($_SERVER);

//  // file_put_contents('baidu.txt', $result);
//  //var_dump($result);
//  curl_close($ch);
// var_dump(curl_getinfo($ch));
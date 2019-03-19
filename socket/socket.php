<?php

/** 
  PHP设置脚本最大执行时间的三种方法
　　 1.php.ini文件中
　　 max_execution_time = 120;
    2、通过PHP的ini_set函数设置
    ini_set("max_execution_time", "120");
    3、通过set_time_limit 函数设置
    set_time_limit(120);
    以上几个数字设置为0则无限制，脚本会一直执行下去，直到执行结束。
 * */
set_time_limit(0);

$url = 'http://www.test.com/socket/ctags58.zip';
$port = '80';
/** sockopen 下载文件
 * @parem $url 访问文件的url 地址
 * @parem $port 默认 80
 * @parem $down_name 下载指定路径文件名称 例如 ../aa.zip 
 * */
function sock_down($url,$port=80,$down_name=null)
{
    $info=parse_url($url);

    # 建立连接
    $fp = fsockopen($info["host"],$port,$errno,$errstr,30);
    /*
     为资源流设置阻塞或者阻塞模式  参数：资源流()，0是非阻塞，1是阻塞
    bool stream_set_blocking ( resource $stream , int $mode )
    阻塞的好处是，排除其它非正常因素，阻塞的是按顺序执行的同步的读取。将会一直等到从资源流里面获取到数据才能返回
    而非阻塞，因为不必等待内容，所以能异步的执行，现在读到读不到都没关系，执行读取操作后会立即返回数据
     * */
    stream_set_blocking($fp, 1);

    if(!$fp)
    {
        echo "$errno : $errstr<br/>";
    }
    else
    {
        # 发送一个HTTP请求信息头
        $request_header="GET ".$info['path']." HTTP/1.1".PHP_EOL;
        # 起始行
        # 头域
        $request_header.="Host: ".$info["host"].PHP_EOL;
        # 再一个回车换行表示头信息结束
        $request_header.=PHP_EOL;

        # 发送请求到服务器
        fputs($fp,$request_header);

        if(!isset($down_name) || empty($down_name))
        {
            $down_name=basename($url); //默认当前文件同目录
        }
        # 接受响应
        $fp2=fopen($down_name,'w'); // 要下载的文件名  下载到指定目录
        $line='';
        while (!feof($fp))
        {
            $line.= fputs($fp2,fgets($fp));
        }
        if(feof($fp))
        {
            echo "<script>alert('已下载到当前目录')</script>";
        }
        # 关闭
        fclose($fp2);
        fclose($fp);
    }
}
//函数调用
sock_down($url,$port);

// /**fsockopen 抓取页面
//  * @parem $url 网页地址 host 主机地址 
//  * @parem $port 网址端口 默认80
//  * @parem $t 脚本请求时间 默认30s
//  * @parem $method 请求方式 get/post
//  * @parem $data 如果单独传数据为 post 方式
//  * @return 返回请求回的数据
//  * */

// $url = "http://www.test.com/ob/ob.php"; #url 地址必须 http://xxxxx
// $port=80;
// $t=30;
// $data = array(
//     'foo'=>'bar',
//     'baz'=>'boom',
//     'site'=>'www.manongjc.com',
//     'name'=>'nowa magic');

// function sock_data($url,$port=80,$t=30,$method='get',$data=null)
// {
//     $info=parse_url($url);
//     //var_dump($info);
//     //var_dump(basename($url))//返回路径中的文件名部分。; //默认当前文件同目录
//     $fp = fsockopen($info["host"],$port, $errno, $errstr,$t);

//     // 判断是否有数据
//     if(isset($data) && !empty($data))
//     { 
//         $query = http_build_query($data); // 数组转url 字符串形式
//     }else
//     {
//         $query=null;
//     }
//     // 如果用户的$url "http://www.manongjc.com/";  缺少 最后的反斜杠
//     if(!isset($info['path']) || empty($info['path']))
//     {
//        $info['path']="/index.html";
//     }
//     // 判断 请求方式
//     if($method=='post')
//     {
//         $head = "POST ".$info['path']." HTTP/1.0".PHP_EOL;
//     }else
//     {
//         $head = "GET ".$info['path']."?".$query." HTTP/1.0".PHP_EOL;
//     }

//    $head .= "Host: ".$info['host'].PHP_EOL; // 请求主机地址
//    $head .= "Referer: http://".$info['host'].$info['path'].PHP_EOL;
//     if(isset($data) && !empty($data) && ($method=='post'))
//     {
//         $head .= "Content-type: application/x-www-form-urlencoded".PHP_EOL;
//         $head .= "Content-Length: ".strlen(trim($query)).PHP_EOL;
//         $head .= PHP_EOL;
//         $head .= trim($query);
//     }else
//     {
//         $head .= PHP_EOL;
//     }
//     $write = fputs($fp, $head); //写入文件(可安全用于二进制文件)。 fputs() 函数是 fwrite() 函数的别名
//     while (!feof($fp))
//     {
//         $line = fread($fp,4096);
//         echo $line;
//     }
// }
// // 函数调用
// sock_data($url,$port,$t,'post',$data);



// /**
//  * php 中自带的psockopen函数
//  * 模拟生成 HTTP 连接
//  * @var string
//  */
// $url="http://www.manongjc.com/";
// $port=80;
// $t=30;

// // 函数调用
// fsock($url, $port,$t);

// /**fsockopen 抓取页面
//  * @parem $url 网页地址
//  * @parem $port 端口 默认 80
//  * @parem $t 设置连接的时间 默认30s
//  * */
// function fsock($url,$port=80,$t=30)
// {
//     $info = parse_url($url);
//     $fp = fsockopen($info['host'],$port,$errno,$errstr,$t);
//     if (!$fp)
//     {
//         echo "$errstr ($errno)<br />\n";
//     }
//     else
//     {
//         $out = "GET ".$info['path']." HTTP/1.1".PHP_EOL;
//         $out .= "Host:".$info['host'].PHP_EOL;
//         $out .= "Connection: Close".PHP_EOL.PHP_EOL;
//         echo $out;exit;
//         fwrite($fp, $out);//发出请求
//         $content = '';
//         while (!feof($fp))
//         {
//             $content .= fgets($fp);//获取请求主机的答应
//         }
//         echo $content;
//         fclose($fp);
//     }
// }

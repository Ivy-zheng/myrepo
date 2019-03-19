<?php
    //header("Content-Type: text/html;charset=utf-8");
    //创建一个socket套接流
    $socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
    /****************设置socket连接选项，这两个步骤你可以省略*************/
     //接收套接流的最大超时时间1秒，后面是微秒单位超时时间，设置为零，表示不管它
    socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array("sec" => 1, "usec" => 0));
     //发送套接流的最大超时时间为6秒
    socket_set_option($socket, SOL_SOCKET, SO_SNDTIMEO, array("sec" => 6, "usec" => 0));
    /****************设置socket连接选项，这两个步骤你可以省略*************/

    //连接服务端的套接流，这一步就是使客户端与服务器端的套接流建立联系
    if(socket_connect($socket,'127.0.0.1',8888) == false){
        echo 'connect fail massege:'.socket_strerror(socket_last_error());
    }else{
        $message = 'l love you 我爱你 socket';
        //转为GBK编码，处理乱码问题，这要看你的编码情况而定，每个人的编码都不同
        //目前自己使用php的编码就是utf-8,不用转化
        //$message = mb_convert_encoding($message,'GBK','UTF-8');
        //向服务端写入字符串信息

        if(socket_write($socket,$message,strlen($message)) == false){
            echo 'fail to write'.socket_strerror(socket_last_error());

        }else{
            echo 'client write success'.PHP_EOL;
            //读取服务端返回来的套接流信息
            while($callback = socket_read($socket,1024)){
                echo 'server return message is:'.PHP_EOL.$callback;
            }
        }
    }
    socket_close($socket);//工作完毕，关闭套接流
// $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
// if ($socket === false) {
// echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
// } else {
// echo "socket_create创建成功<br/>".PHP_EOL;
// }

// echo "尝试通过80端口连接www.test.com …"."<br/>";
// $result = socket_connect($socket, 'www.test.com', 80);
// if ($result === false) {
// echo "socket_connect() 连接失败: ($result) " . socket_strerror(socket_last_error($socket)) . PHP_EOL;
// } else {
// echo "连接端口成功."."<br>";
// }



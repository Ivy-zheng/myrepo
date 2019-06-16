<?php

/**
 * PHP amqp(RabbitMQ) Demo-2
 */
$exchangeName = 'demo';
$queueName = 'task_queue';
$routeKey = 'task_queue';//路由关键字
//连接
$connection = new AMQPConnection(array('host' => '127.0.0.1', 'port' => '5672', 'vhost' => '/', 'login' => 'guest', 'password' => 'guest'));
$connection->connect() or die("Cannot connect to the broker!\n");
//消息通道
$channel = new AMQPChannel($connection);
//消息交换机
$exchange = new AMQPExchange($channel);
$exchange->setName($exchangeName);
$exchange->setType(AMQP_EX_TYPE_DIRECT);
$exchange->declareExchange();
//消息队列
$queue = new AMQPQueue($channel);
$queue->setName($queueName);
$queue->setFlags(AMQP_DURABLE);//声明为持久化
$queue->declareQueue();
$queue->bind($exchangeName, $routeKey);//绑定

var_dump('[*] Waiting for messages. To exit press CTRL+C');  
while (TRUE) {  
        $queue->consume('callback');
       //告诉RabbitMQ，再同一时刻，不要发送超过1条消息给一个工作者（worker），直到它已经处理了上一条消息并且作出了响应
        $channel->qos(0,1);
}
$connection->disconnect();

function callback($envelope, $queue) {  
        $msg = $envelope->getBody();
        var_dump(" [x] Received:" . $msg);
        sleep(substr_count($msg,'.'));//计算.在$msg中出现的次数
        //消费者会通过一个ack（响应），告诉RabbitMQ已经收到并处理了某条消息，然后RabbitMQ就会释放并删除这条消息
        $queue->ack($envelope->getDeliveryTag());
}
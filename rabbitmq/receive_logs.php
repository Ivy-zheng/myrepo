<?php

/**
 * PHP amqp(RabbitMQ) Demo-3
 */
$exchangeName = 'logs';

$connection = new AMQPConnection(array('host' => '127.0.0.1', 'port' => '5672', 'vhost' => '/', 'login' => 'guest', 'password' => 'guest'));
$connection->connect() or die("Cannot connect to the broker!\n");

$channel = new AMQPChannel($connection);

$exchange = new AMQPExchange($channel);
$exchange->setName($exchangeName);
$exchange->setType(AMQP_EX_TYPE_FANOUT);//把消息发送给它所知道的所有队列
$exchange->declareExchange();

$queue = new AMQPQueue($channel);
$queue->setFlags(AMQP_EXCLUSIVE);//当与消费者（consumer）断开连接的时候，这个队列应当被删除
$queue->declareQueue();//创建一个随机的队列名
$queue->bind($exchangeName, '');

var_dump('[*] Waiting for messages. To exit press CTRL+C');  
while (TRUE) {  
        $queue->consume('callback');
}
$connection->disconnect();

function callback($envelope, $queue) {  
        $msg = $envelope->getBody();
        var_dump(" [x] Received:" . $msg);
        $queue->nack($envelope->getDeliveryTag());
}
<?php

/**
 * PHP amqp(RabbitMQ) Demo-2
 */

$exchangeName = 'demo';
$queueName = 'task_queue';
$routeKey = 'task_queue';
$message = empty($argv[1]) ? 'Hello World!' : ' '.$argv[1];

$connection = new AMQPConnection(array('host' => '127.0.0.1', 'port' => '5672', 'vhost' => '/', 'login' => 'guest', 'password' => 'guest'));
$connection->connect() or die("Cannot connect to the broker!\n");

$channel = new AMQPChannel($connection);

$exchange = new AMQPExchange($channel);
$exchange->setName($exchangeName);

$queue = new AMQPQueue($channel);
$queue->setName($queueName);
$queue->setFlags(AMQP_DURABLE);//声明为持久化
$queue->declareQueue();

$exchange->publish($message, $routeKey);
var_dump("[x] Sent $message");

$connection->disconnect();
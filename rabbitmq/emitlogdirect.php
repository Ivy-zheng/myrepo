<?php

/**
 * PHP amqp(RabbitMQ) Demo-4
 */
$severity = count($argv) > 2 ? $argv[1] : 'info';
$message = empty($argv[2]) ? 'Hello World!' : ' ' . $argv[2];

var_dump($argv);

$connection = new AMQPConnection(array('host' => '127.0.0.1', 'port' => '5672', 'vhost' => '/', 'login' => 'guest', 'password' => 'guest'));
$connection->connect() or die("Cannot connect to the broker!\n");

$channel = new AMQPChannel($connection);

$exchange = new AMQPExchange($channel);
$exchange->setName('direct_logs');
$exchange->setType(AMQP_EX_TYPE_DIRECT);
$exchange->declareExchange();

$exchange->publish($message, $severity);//发送消息

var_dump("[x] Sent $message");

$connection->disconnect();
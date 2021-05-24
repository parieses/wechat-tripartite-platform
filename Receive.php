<?php


use WeChat\library\Authorization;
use WeChat\WeChatServer;

require __DIR__ . '/vendor/autoload.php';


$componentAppId = 'wx9f42dd7989abd9d9';
$componentAppSecret = 'c6f44578a0d99bd54ffe7b9ecb5b26fa';
//消息校验Token
$token = 'xingfuli';
//消息加解密Key
$encodingAesKey = '1CD37E73D5D74B439A167DE3014FD882521XINGFULI';
$weChat = new WeChatServer(Authorization::class, ['componentAppId' => $componentAppId, 'componentAppSecret' => $componentAppSecret, 'token' => $token, 'encodingAesKey' => $encodingAesKey]);
$object = $weChat->getInstance();
$ticket = $object->getTicket(file_get_contents("php://input"), $_GET['timestamp'], $_GET['nonce']);
file_put_contents('Receive.txt', $ticket . PHP_EOL);










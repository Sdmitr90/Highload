<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Modules\Rabbit\RabbitPublisherService;
use App\Modules\Rabbit\RabbitReceivingService;
use Ratchet\Server\IoServer;
use App\Modules\Chat;

//$rabbitPublishedService = new RabbitPublisherService();
//
//$rabbitPublishedService->sendMessage();

$rabbitReceivingService = new RabbitReceivingService();

$rabbitReceivingService->handleMessage();

//$server = IoServer::factory(
//    new Chat(),
//    8181
//);
//
//$server->run();

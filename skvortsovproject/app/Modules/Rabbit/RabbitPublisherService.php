<?php

namespace App\Modules\Rabbit;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exception\AMQPProtocolChannelException;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitPublisherService
{
    public function __construct(private ?AMQPStreamConnection $AMQPStreamConnection = null)
    {
        $this->AMQPStreamConnection = $this->AMQPStreamConnection ??
            new AMQPStreamConnection(
                'localhost',
                5672,
                'guest',
                'guest'
            );
    }

    public function sendMessage()
    {
        try {
            $channel = $this->AMQPStreamConnection->channel();
            $channel->queue_declare('lesson_7', false, true, false, false);

            $msg = new AMQPMessage('homework');

            $channel->basic_publish($msg, '', 'lesson_7');

            $channel->close();
            $this->AMQPStreamConnection->close();
        }catch (AMQPProtocolChannelException | \AMQPException $e ){
            echo $e->getMessage();
        }
    }
}

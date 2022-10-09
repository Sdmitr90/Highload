<?php

namespace App\Modules\Rabbit;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exception\AMQPProtocolChannelException;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitReceivingService
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

    public function handleMessage(){
        try {
            $channel = $this->AMQPStreamConnection->channel();
            $channel->queue_declare('lesson_7', false, true, false, false);

            $channel->basic_consume(
                'lesson_7',
                false,
                true,
                false,
                [$this, 'processOrder']
            );






            while(count($channel->callbacks)){
                $channel->wait();
            }

            $channel->close();

            $this->AMQPStreamConnection->close();

        }catch (AMQPProtocolChannelException | \AMQPException $e ){
            echo $e->getMessage();
        }
    }

    public function processOrder(string $msg, $channel)
    {
        $channel->queue_declare('lesson_7', false, true, false, false);

        $msg = new AMQPMessage('homework done!');

        $channel->basic_publish($msg, '', 'hello');

//        $msg = new AMQPMessage('homework');


        echo ' [x] sent "Hello world!" \n';
    }

}

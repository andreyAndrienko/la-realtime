<?php

namespace App\Workers;

use Amqp;
use App\Events\ChatMessage;
use App\Models\Message;
use Bschmitt\Amqp\Consumer;
use PhpAmqpLib\Message\AMQPMessage;

class MessageSenderWorker
{
    const QUEUE_NAME = 'messagesQueue';
    const EXCHANGE_NAME = 'messages';
    const EXCHANGE_TYPE = 'direct';
    const ROUTING_KEY = 'messages';

    public function work(): void
    {
        Amqp::consume(self::QUEUE_NAME, function (AMQPMessage $message, Consumer $resolver) {
            $data = $this->dataPrepare($message->body);


            if (!$data) {
                $resolver->reject($message);
                return;
            }

            ChatMessage::dispatch(new Message($data));

            $resolver->acknowledge($message);
        }, [
            'queue'         => self::QUEUE_NAME,
            'exchange'      => self::EXCHANGE_NAME,
            'exchange_type' => self::EXCHANGE_TYPE,
            'routing'       => self::ROUTING_KEY,
        ]);
    }

    protected function dataPrepare(string $data): ?array
    {
        return json_decode($data, true);
    }
}

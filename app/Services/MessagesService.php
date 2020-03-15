<?php

namespace App\Services;

use Amqp;
use App\Models\User;
use App\Workers\MessageSenderWorker;

class MessagesService
{
    public function storeNewMessage(User $user, string $messageText): void
    {
        $messageJson = $user->messages()->create(['message' => $messageText])->toJson();

        Amqp::publish(MessageSenderWorker::ROUTING_KEY, $messageJson, [
            'exchange'      => MessageSenderWorker::EXCHANGE_NAME,
            'exchange_type' => MessageSenderWorker::EXCHANGE_TYPE
        ]);
    }
}

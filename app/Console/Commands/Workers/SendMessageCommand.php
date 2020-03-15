<?php

namespace App\Console\Commands\Workers;

use App\Workers\MessageSenderWorker;
use Illuminate\Console\Command;

class SendMessageCommand extends Command
{
    protected $signature = 'worker:send-messages';

    private MessageSenderWorker $messageSenderWorker;

    public function __construct(MessageSenderWorker $messageSenderWorker)
    {
        parent::__construct();

        $this->messageSenderWorker = $messageSenderWorker;
    }

    public function handle(): void
    {
        $this->messageSenderWorker->work();
    }
}

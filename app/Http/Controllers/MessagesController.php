<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Services\MessagesService;

class MessagesController extends Controller
{
    public function store(StoreMessageRequest $request, MessagesService $messagesService): void
    {
        $messagesService->storeNewMessage(auth()->user(), $request->get('message'));
    }
}

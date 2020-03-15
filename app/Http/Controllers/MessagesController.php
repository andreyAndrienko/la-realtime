<?php

namespace App\Http\Controllers;

use App\Services\MessagesService;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function store(Request $request, MessagesService $messagesService): void
    {
        $messagesService->storeNewMessage(auth()->user(), $request->get('message'));
    }
}

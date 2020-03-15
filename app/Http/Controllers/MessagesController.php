<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function store(Request $request): void
    {
        ChatMessage::dispatch($request->get('message'));
    }
}

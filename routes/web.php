<?php

use Illuminate\Support\Facades\Route;
use OpenAI\Laravel\Facades\OpenAI;

Route::get('/', function () {
    return view('index');
});

Route::get('/chats', function () {
    return view('index');
});


Route::get('/chat', function () {
    $type = new stdClass();
    $chat = \App\Models\Chat::first();
    $user = \App\Models\User::all();
    $message = \App\Models\Message::where('user_id', 1)->where('message', 'LIKE', 'meow%')->get()->first();
    $test = [
        'meow',
        1,
        2,
        [
            'hamez' => 'coollest'
        ]
    ];

//
    dd($message, $chat->messages);
});
Route::post('/chat-ask', [\App\Http\Controllers\ChatController::class, 'ask'])->name('chat.ask');



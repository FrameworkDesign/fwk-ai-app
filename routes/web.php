<?php

use Illuminate\Support\Facades\Route;
use OpenAI\Laravel\Facades\OpenAI;

Route::get('/', function () {
    return view('index');
});

Route::get('/test', function () {
    $result = OpenAI::chat()->create([
//        'model' => 'gpt-3.5-turbo',
//        'messages' => [
//            ['role' => 'user', 'content' => 'Hello!'],
//        ],
        'model' => 'gpt-4',
        'messages' => [
            ['role' => 'user', 'content' => 'do you like pina coladas?',]
        ],
    ]);

    return $result->choices[0]->message->content; // Hello! How can I assist you today?
});



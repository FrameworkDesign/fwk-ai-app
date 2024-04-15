<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use OpenAI\Laravel\Facades\OpenAI;

Route::get('/', function () {
    return view('index');
});

Route::get('/chats', function () {
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

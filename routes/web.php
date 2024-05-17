<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use OpenAI\Laravel\Facades\OpenAI;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/chats', [ChatController::class, 'index'])->name('chat.index');

    Route::get('/chats/{chat}', [ChatController::class, 'show'])->name('chat.show');
    Route::post('/chats/create', [ChatController::class, 'create'])->name('chat.create');

    Route::post('/chat/ask/{chat}', [ChatController::class, 'ask'])
    ->name('chat.ask');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

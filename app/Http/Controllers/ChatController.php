<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatMessageFormRequest;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
class ChatController extends Controller
{
    public function ask(ChatMessageFormRequest $request)
    {
        $question = $request->input('message');
        $result = OpenAI::chat()->create([
//        'model' => 'gpt-3.5-turbo',
//        'messages' => [
//            ['role' => 'user', 'content' => 'Hello!'],
//        ],
            'model' => 'gpt-4',
            'messages' => [
                ['role' => 'user', 'content' => $question]
            ],
        ]);

        $response = $result->choices[0]->message->content;

        $user = \App\Models\User::first();
        $chat = \App\Models\Chat::first();
        \App\Models\Message::create([
            'user_id' => $user->id,
            'chat_id' => $chat->id,
            'message' => $question,
            'response' => $response
        ]);
        return $response; // Hello! How can I assist you today?
    }
}

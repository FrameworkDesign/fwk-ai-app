<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatMessageFormRequest;
use App\Models\Chat;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
class ChatController extends Controller
{
    public function index(Request $request)
    {
        $chat = Chat::where('id', 1)->get()->first();
        return view('index', compact('chat'));
    }
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
        return redirect()->back();
    }
}

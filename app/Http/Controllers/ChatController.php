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
        $user = auth()->user();
        $chats = Chat::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        return view('chat.index', compact('chats'));
    }

    public function show(Request $request, Chat $chat)
    {
        return view('chat.show', compact('chat'));
    }

    public function create(Request $request)
    {
        $user = auth()->user();
        $chat = $user->chats()->create([
            'active' => 1
        ]);

        return redirect()->route('chat.show', $chat);
    }



    public function ask(ChatMessageFormRequest $request, Chat $chat)
    {
        // https://platform.openai.com/docs/models
        $question = $request->input('message');
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo-0125',
            'messages' => [
                ['role' => 'user', 'content' => $question]
            ],
        ]);

        $response = $result->choices[0]->message->content;
        $user = $chat->user;
        \App\Models\Message::create([
            'user_id' => $user->id,
            'chat_id' => $chat->id,
            'message' => $question,
            'response' => $response
        ]);
        return redirect()->back();
    }
}

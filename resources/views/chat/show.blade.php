<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chat') }}: {{ $chat->id }}
        </h2>
    </x-slot>


    <div class="py-6">
        <div class="flex flex-col h-full max-w-4xl mx-auto bg-white shadow rounded-lg">
            <!-- Chat Messages Container -->
            <div class="flex-1 overflow-auto p-4 space-y-4">
                @if(!is_null($chat) && $chat->messages)
                    @foreach($chat->messages as $message)
                    <div class="flex items-end justify-end">
                        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                            <div>
                                <span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-gray-300 text-gray-600">
                                    {!! $message->message !!}
                                </span>
                            </div>
                        </div>
                        <img src="https://via.placeholder.com/50" alt="Your profile" class="w-6 h-6 rounded-full order-2">
                    </div>
                    <div class="flex items-end">
                        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                            <div>
                            <span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-blue-600 text-white ">
                                {!! $message->response !!}
                            </span>
                            </div>
                        </div>
                        <img src="https://via.placeholder.com/50" alt="My profile" class="w-6 h-6 rounded-full order-1">
                    </div>
                    @endforeach
                @endif
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Message Input Field -->
            <div class="mb-4 mx-4" id="chat-box">

                <form action="{{route('chat.ask', ['chat' => $chat->id])}}#chat-box" method="POST" class="flex items-center py-2 px-3 bg-gray-50 rounded-lg">
                    @csrf
                    <input type="text" name="message" placeholder="Type your message here..." class="bg-gray-50 outline-none text-sm flex-1">
                    <button class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

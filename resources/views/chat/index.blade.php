<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Chats') }}
            </h2>
                <form action="{{ route('chat.create') }}" method="POST">
                    @csrf
                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        {{ __('New Chat') }}
                    </button>
                </form>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($chats as $chat)
                    <div class="p-6 text-gray-900 dark:text-gray-100 group relative py-10">
                        <a href="{{route('chat.show', ['chat' => $chat->id])}}#chat-box" class="absolute inset-0 group-hover:bg-indigo-700 flex items-center pl-8">
                            {{ $chat->id }} - {{ $chat->user->name }} - {{ \Carbon\Carbon::parse($chat->created_at)->format('d/m/Y - H:i:s')}} - Messages: {{ $chat->messages->count() }}
                            <br>
                            First message:
                            @if($chat->messages->count() > 0)
                                {{ \Illuminate\Support\Str::limit($chat->messages->first()->response, $limit = 180, $end = '...') }}
                            @endif
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>

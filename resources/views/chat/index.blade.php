<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Chats') }}
            </h2>
            <x-primary-button>
                <a href="">{{ __('New Chat') }}</a>
            </x-primary-button>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($chats as $chat)
                    <div class="p-6 text-gray-900 dark:text-gray-100 group relative">
                        <a href="{{route('chat.show', ['chat' => $chat->id])}}" class="absolute inset-0 group-hover:bg-indigo-700 flex items-center pl-8">
                            @if($chat->messages->count() > 0)
                                {{ \Illuminate\Support\Str::limit($chat->messages->first()->message, $limit = 180, $end = '...') }}
                            @endif
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>

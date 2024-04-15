<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 h-screen p-4">
    <div class="flex flex-col h-full max-w-4xl mx-auto bg-white shadow rounded-lg">
        <!-- Chat Messages Container -->
        <div class="flex-1 overflow-auto p-4 space-y-4">
            <!-- Example of a user message -->
            <div class="flex items-end">
                <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                    <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-blue-600 text-white ">Hello, how can I assist you today?</span></div>
                </div>
                <img src="https://via.placeholder.com/50" alt="My profile" class="w-6 h-6 rounded-full order-1">
            </div>
            <!-- Example of a reply -->
            <div class="flex items-end justify-end">
                <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                    <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-gray-300 text-gray-600">I'm looking for assistance with my project.</span></div>
                </div>
                <img src="https://via.placeholder.com/50" alt="Your profile" class="w-6 h-6 rounded-full order-2">
            </div>
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
        <div class="mb-4 mx-4">
            <form action="{{ route('chat.ask') }}" method="POST" class="flex items-center py-2 px-3 bg-gray-50 rounded-lg">
                @csrf
                <input type="text" name="message" placeholder="Type your message here..." class="bg-gray-50 outline-none text-sm flex-1">
                <button class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Send
                </button>
            </form>
        </div>
    </div>

    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>
    </body>
</html>

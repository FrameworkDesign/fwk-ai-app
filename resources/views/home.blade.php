<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mr-5">
                {{ __('FWK Chat AI') }}
            </h1>
            @guest
                <x-secondary-button>
                    <a href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </x-secondary-button>
            @endguest
        </div>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight mr-5">Welcome to FWK AI chat bot</h2>
        </div>
    </div>

</x-app-layout>

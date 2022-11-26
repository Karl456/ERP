<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="antialiased bg-gray-100 flex flex-col min-h-screen">
        <header class="relative z-10 bg-white p-4 shadow-md">
            <div class="container m-auto">
                {{ config('app.name') }}
            </div>
        </header>
        <div class="flex flex-grow min-h-full">
            <aside class="w-64 bg-white shadow-md flex flex-col">
                <div class="flex-grow">
                    <a href="{{ route('pages.index') }}" class="block mb-2 p-2 text-blue-400">Home</a>
                    @foreach($collections as $collection)
                        <a href="{{ route('entities.index', $collection->handle) }}" class="block mb-2 p-2 text-blue-400">{{ $collection->name }}</a>
                    @endforeach
                </div>
                <div class="flex-end">
                    <a href="{{ route('collections.index') }}" class="block mb-2 p-2 text-blue-400">Collections</a>
                </div>
            </aside>
            <div class="container mx-auto py-6">
                {{ $slot }}
            </div>
        </div>
        @livewireScripts
    </body>
</html>

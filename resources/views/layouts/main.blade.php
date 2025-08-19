<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MLP To-Do</title>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-zinc-200">
        <header class="container pt-8 pb-14 flex justify-center lg:justify-start">
            <img src="{{ asset('img/logo.png') }}" alt="MLP Logo" />
        </header>

        <main class="container">
            @if (session()->has('alert.message'))
                <x-alert status="{{ session()->get('alert.status', 'info') }}" class="mb-6">
                    {{ session()->get('alert.message') }}
                </x-alert>
            @endif

            {{ $slot }}
        </main>

        <footer class="text-center text-sm pt-14 pb-8">
            Copyright &copy; {{ date('Y') }} All Rights Reserved.
        </footer>
    </body>
</html>

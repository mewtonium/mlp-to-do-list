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
<body class="min-h-screen bg-zinc-200 py-10">
    <main class="container">
        @if (session()->has('alert.message'))
            <x-alert status="{{ session()->get('alert.status', 'info') }}">
                {{ session()->get('alert.message') }}
            </x-alert>
        @endif

        {{ $slot }}
    </main>
</body>
</html>

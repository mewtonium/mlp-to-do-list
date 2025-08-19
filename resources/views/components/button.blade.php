@props(['type' => 'button', 'variant'])

@php
    $style = match ($variant) {
        'primary' => 'bg-blue-700 text-white hover:bg-blue-500 focus:bg-blue-500 active:bg-blue-700 focus:ring-blue-500',
        'danger' => 'bg-red-600 text-white hover:bg-red-500 focus:bg-red-500 active:bg-red-700 focus:ring-red-500',
        'success' => 'bg-green-500 text-white hover:bg-green-400 focus:bg-green-500 active:bg-green-700 focus:ring-green-500',
        default => 'bg-gray-800 text-white hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:ring-blue-500',
    };
@endphp

<button {{ $attributes->merge(['type' => $type, 'class' => "inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md text-sm tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 {$style}"]) }}>
    {{ $slot }}
</button>

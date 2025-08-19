@props(['message'])

@if ($message)
    <span class="text-red-600 text-xs font-semibold">
        {{ $message }}
    </span>
@endif

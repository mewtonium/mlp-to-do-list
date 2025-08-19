@props(['status'])

@php
$style = match ($status) {
    'success' => 'bg-emerald-100 border-emerald-200 text-emerald-800',
    'warning' => 'bg-amber-100 border-amber-200 text-amber-800',
    'error' => 'bg-red-100 border-red-200 text-red-800',
    default => 'bg-blue-100 border-blue-200 text-blue-800',
};
@endphp

<div {{ $attributes->merge(['class' => "border rounded-lg p-4 text-sm {$style}"]) }} role="alert">
    {{ $slot }}
</div>

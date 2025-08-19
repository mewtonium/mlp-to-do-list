@props(['disabled' => false])

<input type="text" @disabled($disabled) {{ $attributes->merge(['class' => 'border border-gray-400 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-inset py-2 px-3']) }}>

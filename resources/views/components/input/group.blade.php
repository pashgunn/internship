@props(['error'])
<div class="block">
    <label {{ $attributes }} class="text-gray-700 font-bold">{{ $name }}</label>
    {{ $slot }}
    @if (!empty($error))
        <span class="text-xs italic text-red-600">{{ $error }}</span>
    @endif
</div>

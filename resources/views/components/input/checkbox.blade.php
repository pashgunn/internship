<div class="block">
    <div class="mt-2">
        <div>
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" {{ $attributes }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" @checked(old($attributes['name']))>
                <span class="ml-2">{{ $slot }}</span>
            </label>
        </div>
    </div>
</div>

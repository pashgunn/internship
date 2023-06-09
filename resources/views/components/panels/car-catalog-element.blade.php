<div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
    <a class="block w-full h-40" href="{{ route('products.show', $product) }}"><img class="w-full h-full hover:opacity-90 object-cover" {{ $attributes }} alt="{{ $product->name }}"></a>
    <div class="px-6 py-4">
        <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
        </div>
        <p class="text-grey-darker text-base">
            <span class="inline-block">{{ number_format($product->price, 0, '', ' ') }} ₽</span>
            @if($product->old_price)
                <span class="inline-block line-through pl-6 text-gray-400">{{ number_format($product->old_price, 0, '', ' ') }} ₽</span>
            @endisset
        </p>
    </div>
</div>

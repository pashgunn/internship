<a class="inline-block p-4 {{ request()->routeIs('products.category') && ($categorySlug === $item->slug || $item->descendants->contains('slug', $categorySlug)) ? 'text-orange' :  'text-black'}} font-bold border-l border-r border-transparent group-hover:text-orange group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow"
   href="{{ route('products.category', $item->slug) }}">
    {{ $slot }}
    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4" fill="none" viewBox="0 0 24 24"
         stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
    </svg>
</a>

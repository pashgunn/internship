<nav class="order-1">
    <ul class="block lg:flex">
        <li class="group"><a
                class="inline-block p-4 {{ request()->routeIs('products.index') ? 'text-orange' :  'text-black'}} font-bold hover:text-orange"
                href="{{ route('products.index') }}">Каталог</a></li>
        @foreach($categoryTree as $item)
            @if($item->descendants->isEmpty())
                <li class="group"><a
                        class="inline-block p-4 {{ request()->routeIs('products.category') && $categorySlug === $item->slug ? 'text-orange' :  'text-black'}} font-bold hover:text-orange"
                        href="{{ route('products.category', $item->slug) }}">{{ $item->name }}</a></li>
            @else
                <li class="group">
                    <x-panels.car-type :$item :$categorySlug>
                        {{ $item->name }}
                    </x-panels.car-type>
                    <ul class="dropdown-navigation-submenu absolute hidden group-hover:block bg-white shadow-lg">
                        @foreach($item->descendants as $descendant)
                            <li>
                                <a class="block py-2 px-4 {{ request()->routeIs('products.category') && $categorySlug === $descendant->slug ? 'text-orange' :  'text-black'}} hover:text-orange hover:bg-gray-100"
                                   href="{{ route('products.category', $descendant->slug) }}">{{ $descendant->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach
    </ul>
</nav>

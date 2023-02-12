@props(['articles'])
@foreach($articles as $article)
    <x-panels.article-car :$article src="/pictures/car_ceed.png">
        <x-panels.tag>Киа Seed</x-panels.tag>
    </x-panels.article-car>
@endforeach

{{--            <x-panels.news-car src="/pictures/car_k900.png">--}}
{{--                <x-panels.tag>Парадигма</x-panels.tag>--}}
{{--                <x-panels.tag>Архетип</x-panels.tag>--}}
{{--                <x-panels.tag>Киа Seed</x-panels.tag>--}}
{{--            </x-panels.news-car>--}}

{{--            <x-panels.news-car src="/pictures/car_soul.png">--}}
{{--                <x-panels.tag>Это</x-panels.tag>--}}
{{--                <x-panels.tag>Теги</x-panels.tag>--}}
{{--            </x-panels.news-car>--}}

@props(['articles'])
@foreach($articles as $article)
    <x-panels.article-car-main src="/pictures/car_ceed.png" :$article>
        <x-panels.tag>Киа Seed</x-panels.tag>
    </x-panels.article-car-main>
@endforeach

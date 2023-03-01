@props(['articles'])
@foreach($articles as $article)
    <x-panels.article-car-all src="/pictures/car_ceed.png" :$article>
        <x-panels.tags :$article/>
    </x-panels.article-car-all>
@endforeach

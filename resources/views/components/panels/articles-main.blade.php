@props(['articles'])
@foreach($articles as $article)
    <x-panels.article-car-main src="{{ asset($article->image->name) }}" :$article>
        <x-panels.tags :$article/>
    </x-panels.article-car-main>
@endforeach

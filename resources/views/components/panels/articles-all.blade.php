@props(['articles'])
@foreach($articles as $article)
    <x-panels.article-car-all src="{{ asset($article->image->name) }}" :$article>
        <x-panels.tags :$article/>
    </x-panels.article-car-all>
@endforeach

@props(['articles'])
@foreach($articles as $article)
    <x-panels.article-car-main src="{{ Storage::url($article->image->path) }}" :$article>
        <x-panels.tags :$article/>
    </x-panels.article-car-main>
@endforeach

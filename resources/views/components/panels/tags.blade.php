@props(['article'])

@if($article->tags->isNotEmpty())
    @foreach($article->tags as $tag)
        <x-panels.tag>{{ $tag->name }}</x-panels.tag>
    @endforeach
@endif

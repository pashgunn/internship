@extends('layouts.inner')

@section('page.title', $article->title)

@section('inner.content')
        <div class="space-y-4">
            @admin()
                <a class="hover:text-orange" href="{{ route('articles.edit', $article->slug) }}">Редактирование новости</a>
            @endadmin
            <img src="{{ Storage::url($article->image->path) }}" alt="" title="">

            <div>
                <x-panels.tags :$article/>
            </div>
            {!! $article->body  !!}
        </div>

        <div class="mt-4">
            <a class="inline-flex items-center text-orange hover:opacity-75" href="{{ route('articles.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg>
                К списку новостей
            </a>
        </div>
@endsection

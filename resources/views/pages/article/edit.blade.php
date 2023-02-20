@extends('layouts.app')

@section('page.title', 'Редактирование новости')

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Редактирование новости</h1>

        <x-panels.error/>

        <form method="POST" action="{{ route('articles.update', $article) }}">
            @method('PATCH')
            <x-panels.article-groups :$article/>
        </form>

        <form method="POST" action="{{ route('articles.destroy', $article) }}">
            @csrf
            @method('DELETE')

            <div class="block">
                <x-input.button-gray>
                    Удалить
                </x-input.button-gray>
            </div>
        </form>
    </div>
@endsection

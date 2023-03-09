@extends('layouts.inner')

@section('page.title', 'Все новости')

@section('inner.content')
    <x-panels.success/>

    <a class="hover:text-orange" href="{{ route('articles.create') }}">Создание новости</a>
    <div class="space-y-4">
        <x-panels.articles-all :$articles/>
        <div>
            {{$pagination->onEachSide(1)->links()}}
        </div>
    </div>
@endsection

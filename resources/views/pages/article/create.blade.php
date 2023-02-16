@extends('layouts.app')

@section('page.title', 'Создание новости')

@section('content')
<div class="p-4">
    <h1 class="text-black text-3xl font-bold mb-4">Создание новости</h1>

    <x-panels.error/>

    <form method="post" action="{{ route('articles.store') }}">
        @csrf
        <x-panels.article-groups :article="new \App\Models\Article()"/>
    </form>
</div>
@endsection

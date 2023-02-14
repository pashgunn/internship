@extends('layouts.inner')

@section('page.title', $article->title)

@section('nav')
    <nav class="container mx-auto bg-gray-100 py-1 px-4 text-sm flex items-center space-x-2">
        <a class="hover:text-orange" href="{{ route('homepage') }}">Главная</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
        </svg>
        <a class="hover:text-orange" href="{{ route('homepage') }}">Новости</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
        </svg>
        <span>{{ $article->title }}</span>
    </nav>
@endsection

@section('inner.content')
        <div class="space-y-4">

            <img src="{{ asset('/pictures/car_new_stinger.png') }}" alt="" title="">

            <div>
                <span class="text-sm text-white italic rounded bg-orange px-2">Это</span>
                <span class="text-sm text-white italic rounded bg-orange px-2">Теги</span>
            </div>
            {!! $article->body  !!}
            </div>

        <div class="mt-4">
            <a class="inline-flex items-center text-orange hover:opacity-75" href="{{ route('articles') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg>
                К списку новостей
            </a>
        </div>
@endsection

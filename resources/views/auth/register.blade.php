@extends('layouts.app')

@section('page.title', 'Регистрация')

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Регистрация</h1>

        <x-panels.error/>

        <form method="POST" action="{{ route('register') }}">
            <x-panels.auth.register/>
        </form>
    </div>
@endsection

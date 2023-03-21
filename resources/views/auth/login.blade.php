@extends('layouts.app')

@section('page.title', 'Авторизация')

@section('content')
<div class="p-4">
    <h1 class="text-black text-3xl font-bold mb-4">Авторизация</h1>

    <x-panels.error/>

    <form method="POST" action="{{ route('login') }}">
        <x-panels.auth.login/>
    </form>
</div>
@endsection

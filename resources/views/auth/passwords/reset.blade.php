@extends('layouts.app')

@section('page.title', 'Сбросить пароль')

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Сбросить пароль</h1>

        <x-panels.error/>

        <form method="POST" action="{{ route('password.update') }}">
            <x-panels.auth.passwords.reset/>
        </form>
    </div>
@endsection

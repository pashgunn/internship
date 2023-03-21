@extends('layouts.app')

@section('page.title', 'Подтвердить пароль')

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Подтвердить пароль</h1>

        <x-panels.error/>

        {{ __('Пожалуйста, подтвердите свой пароль перед продолжением') }}

        <form method="POST" action="{{ route('password.confirm') }}">
            <x-panels.auth.passwords.confirm/>
        </form>
    </div>
@endsection

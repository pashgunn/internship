@extends('layouts.app')

@section('page.title', 'Восстановить пароль')

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Восстановить пароль</h1>

        <x-panels.error/>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            <x-panels.auth.passwords.email/>
        </form>
    </div>
@endsection

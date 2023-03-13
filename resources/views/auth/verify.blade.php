@extends('layouts.app')

@section('page.title', 'Верификация')

@section('content')
<div class="p-4">
    <h1 class="text-black text-3xl font-bold mb-4">{{ __('Проверьте свой адрес электронной почты') }}</h1>

    <x-panels.error/>

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('На ваш адрес электронной почты была отправлена новая ссылка для проверки.') }}
        </div>
    @endif

    {{ __('Прежде чем приступить к работе, проверьте свою электронную почту на наличие проверочной ссылки.') }}
    {{ __('Если вы не получили электронное письмо') }},

    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите здесь, чтобы запросить другую') }}</button>.
    </form>

</div>
@endsection

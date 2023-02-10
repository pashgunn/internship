@extends('layouts.app')

@push('main_css')
    <link href="/css/inner_page_template_styles.css" rel="stylesheet">
@endpush

@section('nav')
    <x-panels.nav>
        @yield('page.title')
    </x-panels.nav>
@endsection

@section('content')
    <x-panels.inner-main/>
@endsection

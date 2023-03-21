@extends('layouts.app')

@push('main_css')
    <link href="{{ asset('/css/inner_page_template_styles.css') }}" rel="stylesheet">
@endpush

@section('content')
    <x-panels.inner-main/>
@endsection

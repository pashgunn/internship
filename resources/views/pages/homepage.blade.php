@extends('layouts.app')

@push('main_css')
    <link href="{{ asset('/css/main_page_template_styles.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section class="bg-white">
        <div data-slick-carousel>
            @foreach($banners as $banner)
                <x-panels.relative-banner src="{{ Storage::url($banner->image->path) }}">
                    <x-slot name="title">
                        {{ $banner->title }}
                    </x-slot>
                    <x-slot name="description">
                        {{ $banner->description }}
                    </x-slot>
                </x-panels.relative-banner>
            @endforeach
        </div>
    </section>
    @if($products->count())
    <section class="pb-4 px-6">
        <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
        <x-panels.car-catalog>
            @foreach($products as $product)
                <x-panels.car-catalog-element src="{{ Storage::url($product->mainImage->path) }}" :$product/>
            @endforeach
        </x-panels.car-catalog>
    </section>
    @endif
    <section class="news-block-inverse px-6 py-4">
        <div>
            <p class="inline-block text-3xl text-white font-bold mb-4">Новости</p>
            <span class="inline-block text-gray-200 pl-1"> / <a href="{{ route('articles.index') }}" class="inline-block pl-1 text-gray-200 hover:text-orange"><b>Все</b></a></span>
        </div>
        <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-6">
            <x-panels.articles-main :$articles/>
        </div>
    </section>
@endsection

@extends('layouts.app')

@push('main_css')
    <link href="{{ asset('/css/main_page_template_styles.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section class="bg-white">
        <div data-slick-carousel>
            <x-panels.relative-banner src="/pictures/test_banner_1.jpg">
                Купи Астон Мартин, получи секретное Задание
            </x-panels.relative-banner>

            <x-panels.relative-banner src="/pictures/test_banner_2.jpg">
                Купи Роллс Ройс, получи Отчество к&nbsp;своему имени
            </x-panels.relative-banner>

            <x-panels.relative-banner src="/pictures/test_banner_3.jpg">
                Купи Бентли, получи бейсболку
            </x-panels.relative-banner>
        </div>
    </section>
    @if($products->count())
    <section class="pb-4 px-6">
        <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
        <x-panels.car-catalog>
            @foreach($products as $product)
                <x-panels.car-catalog-element src="{{ asset($product->mainImage->name) }}" :$product/>
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

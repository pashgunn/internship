@extends('layouts.app')

@push('main_css')
    <link href="/css/main_page_template_styles.css" rel="stylesheet">
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
    <section class="pb-4 px-6">
        <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
            <x-panels.weekly-models src="/pictures/car_cerato.png">
                <x-slot name="car">Cerato</x-slot>
                <x-slot name="price">1 221 900 ₽</x-slot>
                <x-slot name="oldPrice">1 821 900 ₽</x-slot>
            </x-panels.weekly-models>

            <x-panels.weekly-models src="/pictures/car_rio-x.png">
                <x-slot name="car">Rio X</x-slot>
                <x-slot name="price">969 900 ₽</x-slot>
            </x-panels.weekly-models>

            <x-panels.weekly-models src="/pictures/car_mohave_new.png">
                <x-slot name="car">Mohave</x-slot>
                <x-slot name="price">3 549 900 ₽</x-slot>
            </x-panels.weekly-models>

            <x-panels.weekly-models src="/pictures/car_K5-half.png">
                <x-slot name="car">K5</x-slot>
                <x-slot name="price">1 577 900 ₽</x-slot>
            </x-panels.weekly-models>
        </div>
    </section>
    <section class="news-block-inverse px-6 py-4">
        <div>
            <p class="inline-block text-3xl text-white font-bold mb-4">Новости</p>
            <span class="inline-block text-gray-200 pl-1"> / <a href="news.html" class="inline-block pl-1 text-gray-200 hover:text-orange"><b>Все</b></a></span>
        </div>
        <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-6">
            <x-panels.news :articles="$articles"/>
        </div>
    </section>
@endsection

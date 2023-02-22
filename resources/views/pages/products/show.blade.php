@extends('layouts.app')

@push('scripts')
    <script>
        $(function () {
            $('[data-slick-carousel-detail]').each(function () {
                let $carousel = $(this);

                $carousel.find('[data-slick-carousel-detail-items]').slick({
                    dots: true,
                    arrows: false,
                    appendDots: $carousel.find('[data-slick-carousel-detail-pager]'),
                    rows: 0,
                    customPaging: function (slick, index) {
                        let imageSrc = slick.$slides[index].src;

                        return `
<div class="relative">
  <svg xmlns="http://www.w3.org/2000/svg" class="active-arrow absolute -top-6 left-2/4 -ml-3 text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
  </svg>
  <span class="inline-block border rounded cursor-pointer"><img class="h-20 w-40 object-cover" src="${imageSrc}" alt="" title=""></span>
</div>`;
                    }
                })
            })
        })
    </script>
@endpush

@section('nav')
    <x-panels.nav>
        <x-panels.nav-element route="homepage">
            Главная
        </x-panels.nav-element>
        <x-panels.nav-element route="products.index">
            Каталог
        </x-panels.nav-element>
        <x-panels.nav-element route="products.index">
            Легковые
        </x-panels.nav-element>
        <x-panels.nav-element route="products.index">
            Седан
        </x-panels.nav-element>
        <span>{{ $product->name }}</span>
    </x-panels.nav>
@endsection

@section('content')
        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">{{ $product->name }}</h1>
            <div class="flex-1 grid grid-cols-1 lg:grid-cols-5 border-b w-full">
                <div class="col-span-3 border-r-0 sm:border-r pb-4 px-4 text-center catalog-detail-slick-preview" data-slick-carousel-detail>
                    <div class="mb-4 border rounded" data-slick-carousel-detail-items>
                        <img class="w-full" src="{{ asset('pictures/car_K5-half.png') }}" alt="" title="">
                        <img class="w-full" src="{{ asset('pictures/car_k5_1.png') }}" alt="" title="">
                        <img class="w-full" src="{{ asset('pictures/car_k5_2.png') }}" alt="" title="">
                        <img class="w-full" src="{{ asset('pictures/car_k5_3.png') }}" alt="" title="">
                    </div>
                    <div class="flex space-x-4 justify-center items-center" data-slick-carousel-detail-pager>
                    </div>
                </div>
                <div class="col-span-1 lg:col-span-2">
                    <div class="space-y-4 w-full">
                        <div class="block px-4">
                            <p class="text-base line-through text-gray-400">{{ number_format($product->old_price, 0, '', ' ') }} ₽</p>
                            <p class="font-bold text-2xl text-orange">{{ number_format($product->price, 0, '', ' ') }} ₽</p>
                            <div class="mt-4 block">
                                <form>
                                    <button class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Купить
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="block border-t clear-both w-full" data-accordion data-active>
                            <div class="text-black text-2xl font-bold flex items-center justify-between hover:bg-gray-50 p-4 cursor-pointer" data-accordion-toggle>
                                <span>Параметры</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-not-active style="display: none">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-active>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>

                            <div class="my-4 px-4" data-accordion-details>
                                <table class="w-full">
                                    @if($product->salon)
                                    <x-panels.parameter parameter="{{ $product->salon }}">
                                        Салон:
                                    </x-panels.parameter>
                                    @endif
                                    @if($product->carClass?->name)
                                        <x-panels.parameter parameter="{{ $product->carClass->name }}">
                                            Класс:
                                        </x-panels.parameter>
                                    @endif
                                    @if($product->kpp)
                                        <x-panels.parameter parameter="{{ $product->kpp }}">
                                            КПП:
                                        </x-panels.parameter>
                                    @endif
                                    @if($product->year)
                                        <x-panels.parameter parameter="{{ $product->year }}">
                                            Год выпуска:
                                        </x-panels.parameter>
                                    @endif
                                    @if($product->color)
                                        <x-panels.parameter parameter="{{ $product->color }}">
                                            Цвет:
                                        </x-panels.parameter>
                                    @endif
                                    @if($product->carBody?->name)
                                        <x-panels.parameter parameter="{{ $product->carBody->name }}">
                                            Кузов:
                                        </x-panels.parameter>
                                    @endif
                                    @if($product->carEngine?->name)
                                        <x-panels.parameter parameter="{{ $product->carEngine->name }}">
                                            Двигатель:
                                        </x-panels.parameter>
                                    @endif
                                </table>
                            </div>
                        </div>
                        <div class="block border-t clear-both w-full" data-accordion>
                            <div class="text-black text-2xl font-bold flex items-center justify-between hover:bg-gray-50 p-4 cursor-pointer" data-accordion-toggle>
                                <span>Описание</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-not-active>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-active style="display: none">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                            <div class="my-4 px-4 space-y-4" data-accordion-details style="display: none">
                                <p>
                                    {{ $product->body }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

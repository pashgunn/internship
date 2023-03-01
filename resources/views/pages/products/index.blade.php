@extends('layouts.app')

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
        <span>Седан</span>
    </x-panels.nav>
@endsection

@section('content')
<div class="p-4">
    <h1 class="text-black text-3xl font-bold mb-4">Каталог</h1>

    <x-panels.car-catalog>
        @foreach($products as $product)
            <x-panels.car-catalog-element src="{{ asset('pictures/car_ceed.png') }}" :$product/>
        @endforeach
    </x-panels.car-catalog>

    <div class="text-center mt-4">
        {{$pagination->onEachSide(1)->links()}}
    </div>
</div>
@endsection

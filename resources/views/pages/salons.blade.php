@extends('layouts.inner')

@section('page.title', 'Салоны')

@section('inner.content')
    <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">

        <div class="space-y-4 max-w-4xl">
            @forelse($salons as $key => $salon)
                @if(!($key % 2))
                    <div class="w-full flex p-4">
                        <x-panels.salon-image src="{{ asset($salon['image']) }}"/>
                        <x-panels.salon-text :salon="$salon"/>
                    </div>
                @else
                    <div class="w-full flex justify-end bg-gray-100 p-4">
                        <x-panels.salon-text :salon="$salon" :textRight/>
                        <x-panels.salon-image src="{{ asset($salon['image']) }}"/>
                    </div>
                @endif
            @empty
                Сервис получения салонов временно недоступен
            @endforelse
        </div>

        <hr>

        <p class="text-black text-2xl font-bold mb-4">Салоны на карте</p>

        <div class="bg-gray-200">
            Карта с салонами
        </div>
    </div>
@endsection

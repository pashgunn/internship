@extends('layouts.app')

@section('page.title', 'Каталог')

@section('content')
<div class="p-4">
    <h1 class="text-black text-3xl font-bold mb-4">Каталог</h1>

    <x-panels.car-catalog>
        @foreach($products as $product)
            <x-panels.car-catalog-element src="{{ Storage::url($product->mainImage->path) }}" :$product/>
        @endforeach
    </x-panels.car-catalog>

    <div class="text-center mt-4">
        {{$pagination->onEachSide(1)->links()}}
    </div>
</div>
@endsection

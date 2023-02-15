@extends('layouts.app')

@section('page.title', 'Создание новости')

@section('content')
<div class="p-4">
    <h1 class="text-black text-3xl font-bold mb-4">Создание новости</h1>

    <form method="post" action="{{ route('articles') }}">
        @csrf
        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <x-input.group for="inputTitle" :error="$errors->first('title')">
                    <x-slot name="name" >Название новости</x-slot>
                    <x-input.text id="inputTitle" name="title" :error="$errors->first('title')"/>
                </x-input.group>
                <x-input.group for="inputDescription" :error="$errors->first('description')">
                    <x-slot name="name">Краткое описание новости</x-slot>
                    <x-input.text id="inputDescription" name="description" :error="$errors->first('description')"/>
                </x-input.group>
                <x-input.group for="inputBody" :error="$errors->first('body')">
                    <x-slot name="name">Детальное описание</x-slot>
                    <x-input.textarea id="inputBody" name="body" :error="$errors->first('body')"/>
                </x-input.group>
                <x-input.group for="inputPublishedAt">
                    <x-slot name="name">Выбор даты публикации</x-slot>
                    <x-input.date id="inputPublishedAt" name="published_at"/>
                </x-input.group>
                <x-input.checkbox name="checkbox" >
                    Опубликован
                </x-input.checkbox>

                <div class="block">
                    <x-input.button-orange>
                        Сохранить
                    </x-input.button-orange>
                    <x-input.button-gray>
                        Отменить
                    </x-input.button-gray>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

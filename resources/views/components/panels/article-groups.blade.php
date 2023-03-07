@props(['article'])

@csrf
<a class="text-black hover:text-orange" href="{{ url()->previous() }}">Назад</a>
<div class="mt-8 max-w-md">
    <div class="grid grid-cols-1 gap-6">
        <x-input.group for="inputTitle" :error="$errors->first('title')">
            <x-slot name="name">Название новости</x-slot>
            <x-input.text id="inputTitle" name="title" value="{{ old('title', $article->title) }}"
                          :error="$errors->first('title')"/>
        </x-input.group>

        <x-input.group for="inputDescription" :error="$errors->first('description')">
            <x-slot name="name">Краткое описание новости</x-slot>
            <x-input.text id="inputDescription" name="description" value="{{ old('description', $article->description) }}"
                          :error="$errors->first('description')"/>
        </x-input.group>

        <x-input.group for="inputBody" :error="$errors->first('body')">
            <x-slot name="name">Детальное описание</x-slot>
            <x-input.textarea id="inputBody" name="body"
                              :error="$errors->first('body')">{{ old('body', $article->body) }}</x-input.textarea>
        </x-input.group>
        <x-input.group for="inputTags" :error="$errors->first('tags')">
            <x-slot name="name">Теги</x-slot>
            <x-input.text id="inputTags" name="tags" value="{{ old('tags', $article->tags->pluck('name')->implode(',')) }}"
                          :error="$errors->first('tags')"/>
        </x-input.group>
        <x-input.group for="inputPublishedAt">
            <x-slot name="name">Выбор даты публикации</x-slot>
            <x-input.date id="inputPublishedAt" name="published_at" value="{{ old('published_at', \Carbon\Carbon::parse($article->published_at)->toDateString()) }}"/>
        </x-input.group>
        <x-input.group for="inputImage">
            <x-slot name="name"></x-slot>
            <x-input.file id="inputImage" name="image"/>
        </x-input.group>
        <x-input.checkbox name="isPublished" isChecked="{{ old('isPublished', $article->published_at) }}" >
            Опубликован
        </x-input.checkbox>

        <div class="block">
            <x-input.button-orange>
                Сохранить
            </x-input.button-orange>
        </div>
    </div>
</div>

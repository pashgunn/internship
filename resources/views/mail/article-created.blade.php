<x-mail::message>
# Создана новость: {{ $article->title }}
    {{ $article->description }}
    {{ $article->body }}

<x-mail::button :url="'/articles/' . $article->slug">
Посмотреть новость
</x-mail::button>

</x-mail::message>

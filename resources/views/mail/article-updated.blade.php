article-created.blade.php<x-mail::message>
# Новость {{ $article->title }} обновлена
    {{ $article->body }}

<x-mail::button :url="'/articles/' . $article->slug">
Посмотреть новость
</x-mail::button>

</x-mail::message>

@props(['article'])

<div class="w-full flex">
    <x-panels.article-image {{ $attributes }}/>
    <div class="px-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
            <div class="text-white font-bold text-xl mb-2">
                <a class="hover:text-orange" href="article.html">{{ $article->title }}</a>
            </div>
            <p class="text-gray-300 text-base">
                <a class="hover:text-orange" href="article.html">{{ $article->description }}</a>
            </p>
        </div>
        <div>
            {{ $slot }}
        </div>
        <div class="flex items-center">
            <p class="text-sm text-gray-400 italic">{{ \Carbon\Carbon::parse($article->published_at)->locale('ru')->isoFormat('DD MMM YYYY') }}</p>
        </div>
    </div>
</div>

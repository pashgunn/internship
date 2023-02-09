<div class="w-full flex">
    <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
        <a class="block w-full h-full hover:opacity-75" href="article.html"><img {{ $attributes }} class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
    </div>
    <div class="px-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
            <div class="text-white font-bold text-xl mb-2">
                <a class="hover:text-orange" href="article.html">Парадигма просветляет архетип</a>
            </div>
            <p class="text-gray-300 text-base">
                <a class="hover:text-orange" href="article.html">Парадигма просветляет архетип, таким
                    образом, стратегия поведения, выгодная отдельному человеку</a>
            </p>
        </div>
        <div>
            {{ $slot }}
        </div>
        <div class="flex items-center">
            <p class="text-sm text-gray-400 italic">01 Янв 2013</p>
        </div>
    </div>
</div>

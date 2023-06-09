<footer class="container mx-auto">
    <section class="block sm:flex bg-white px-4 sm:px-8 py-4">
        <div class="flex-1">
            <div>
                <p class="inline-block text-3xl text-black font-bold mb-4">Наши салоны</p>
                <span class="inline-block pl-1"> / <a href="{{ route('salons') }}" class="inline-block pl-1 text-gray-600 hover:text-orange"><b>Все</b></a></span>
            </div>

            <div class="grid gap-6 grid-cols-1 lg:grid-cols-2">
                @forelse($footerSalons as $salon)
                    <div class="w-full flex">
                        <x-panels.salon-footer src="{{ asset($salon['image']) }}"/>
                        <x-panels.salon-text :salon="$salon"/>
                    </div>
                @empty
                    Сервис получения салонов временно недоступен
                @endforelse
            </div>
        </div>
        <div class="mt-8 border-t sm:border-t-0 sm:mt-0 sm:border-l py-2 sm:pl-4 sm:pr-8">
            <p class="text-3xl text-black font-bold mb-4">Информация</p>
            <nav>
                <ul class="list-inside  bullet-list-item">
                    <x-panels.menu-tabs/>
                </ul>
            </nav>
        </div>
    </section>


    <div class="space-y-4 sm:space-y-0 sm:flex sm:justify-between items-center py-6 px-2 sm:px-0">
        <div class="copy pr-8">© 2021 Рога &amp; Сила. Продажа автомобилей.</div>
        <div class="text-right">
            <a href="https://www.qsoft.ru" target="_blank" class="inline-block">Сделано в <img class="ml-2 inline-block" src="{{ asset('/images/qsoft.png') }}" width="59" height="11" alt=""/></a>
        </div>
    </div>
</footer>

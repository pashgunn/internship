<div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
    <x-panels.side-menu/>
    <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
        <h1 class="text-black text-3xl font-bold mb-4">@yield('page.title')</h1>
        @yield('inner.content')
    </div>
</div>

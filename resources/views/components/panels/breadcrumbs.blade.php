@unless ($breadcrumbs->isEmpty())
    <x-panels.nav>
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!is_null($breadcrumb->url) && !$loop->last)
                <x-panels.nav-element route="{{ $breadcrumb->url }}">
                    {{ $breadcrumb->title }}
                </x-panels.nav-element>
            @else
                <span>{{ $breadcrumb->title }}</span>
            @endif
        @endforeach
    </x-panels.nav>
@endunless

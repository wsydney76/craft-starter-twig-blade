@props([
    'pages' => [],
    'entry',
    'segment1' => '',
])

<nav class="sm:tw-basis-2/3 grow" aria-label="Primary">
    <ul class="sm:flex">
        @foreach ($pages as $page)
            <li>
                <x-partials.navigation-link
                    :href="$page->url"
                    :active="$segment1 === $page->slug"
                >
                    {{ $page->title }}
                </x-partials.navigation-link>
            </li>
        @endforeach

        @foreach ($entry->localized->all() as $navEntry)
            <li class="block p-2 hover:underline">
                <a href="{{ $navEntry->url }}">{{ $navEntry->site->name }}</a>
            </li>
        @endforeach
    </ul>
</nav>

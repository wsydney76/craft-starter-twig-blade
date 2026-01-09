@props(['pages' => [], 'entry', 'segment1' => ''])

<nav class="sm:tw-basis-2/3 grow-1" aria-label="Primary">
    <ul class="sm:flex">
        <li>
            <a href="/blog"
               @class(['block p-2 hover:underline hover:text-red-600', 'text-red-600' => ($segment1 === 'blog')])
               @if($segment1 === 'blog') aria-current="page" @endif>Blog</a>
        </li>
        <li>
            <a href="/guestbook"
               @class(['block p-2 hover:underline hover:text-red-600', 'text-red-600' => ($segment1 === 'guestbook')])
               @if($segment1 === 'guestbook') aria-current="page" @endif>Guestbook</a>
        </li>
        @foreach($pages as $page)
            <li>
                <a href="{{ $page->url }}"
                   @class(['block p-2 hover:underline hover:text-red-600', 'text-red-600' => ($segment1 === $page->slug)])
                   @if($segment1 === $page->slug) aria-current="page" @endif>{{ $page->title }}</a>
            </li>
        @endforeach
        @foreach($entry->localized->all() as $navEntry)
            <li class="block p-2 hover:underline">
                <a href="{{ $navEntry->url }}">{{ $navEntry->site->name }}</a>
            </li>
        @endforeach
    </ul>
</nav>
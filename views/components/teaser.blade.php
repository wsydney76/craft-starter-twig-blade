<article class="py-6">
    @if (! empty($featured))
        @php
            $hero = $post?->image?->eagerly()?->one();
        @endphp

        <figure class="image-block my-4">
            <a href="{{ $post?->url }}">
                @if ($hero)
                    <img src="{{ $hero->getUrl('hero') }}" alt="{{ $hero->alt }}" />
                @else
                    <div class="bg-slate-200 hover:bg-slate-300 aspect-video"></div>
                @endif
            </a>
        </figure>
    @endif

    <h2 class="text-4xl font-bold">
        <a
            href="{{ $post?->url }}"
            class="text-red-600 hover:underline focus:underline cursor-pointer"
        >
            {{ $post?->title }}
        </a>
    </h2>

    <p>{{ $post?->pageSubheading }}</p>

    <p>
        @if ($post?->postDate)
            <time class="text-sm" datetime="{{ atom($post->postDate) }}">
                {{ $craft->app->formatter->asDate($post->postDate, 'medium') }}
            </time>
        @endif
    </p>
</article>

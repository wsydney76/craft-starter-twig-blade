@props(['landing' => '', 'entry' => null])

@if (! empty($entry?->image))
    @php
        $asset = $entry->image->eagerly()->one();
    @endphp

    @if ($asset)
        <figure>
            <img src="{{ $asset->getUrl('hero') }}" alt="{{ $asset->alt ?? '' }}" />
        </figure>
    @endif
@endif

<header class="container mx-auto pt-12 pb-6 px-2 text-2xl">
    <h1 class="font-bold text-4xl sm:text-6xl lg:text-9xl">{{ $entry->title ?? '' }}</h1>
    <p class="mt-4">{{ $entry->pageSubheading ?? '' }}</p>

    @if ($entry->section->handle === 'blogPosts')
        <div class="text-xs mt-4">
            @php
                $category = $entry->category->eagerly()->one();
            @endphp

            <p>
                @if ($category)
                    <span class="font-bold">{{ $category->title }}</span>
                @endif

                @php
                    $postDate = $entry->postDate ?? null;
                @endphp

                @if ($postDate)
                    <time datetime="{{ atom($postDate) }}">
                        {{ $postDate->format('M j, Y') }}
                    </time>
                @endif
            </p>

            <p class="text-xs">By {{ $entry->author->fullName ?? '' }}</p>
        </div>
    @endif
</header>

<section class="page__content">
    <div class="container mx-auto py-12 px-2 text-balance prose">
        {!! $entry->pageContent !!}
    </div>

    {{ $landing }}
</section>

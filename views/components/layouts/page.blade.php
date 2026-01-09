@props(['landing' => '', 'entry' => null, 'showMeta' => false])

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

<header class="container mx-auto px-2 pt-12 pb-6 text-2xl">
    <h1 class="text-4xl font-bold sm:text-6xl lg:text-9xl">
        {{ $entry->title }}
    </h1>
    <p class="mt-4">{{ $entry->pageSubheading }}</p>

    @if ($showMeta)
        <x-partials.meta class="mt-4" :$entry />
    @endif
</header>

<section class="page__content">
    <div class="container mx-auto px-2 py-12 text-balance">
        <div class="prose prose-lg max-w-none">
            {!! $entry->pageContent !!}
        </div>
    </div>

    {{ $landing }}
</section>

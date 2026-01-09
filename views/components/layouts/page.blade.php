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

<header class="container mx-auto pt-12 pb-6 px-2 text-2xl">
    <h1 class="font-bold text-4xl sm:text-6xl lg:text-9xl">
        {{ $entry->title }}
    </h1>
    <p class="mt-4">{{ $entry->pageSubheading }}</p>

    @if ($showMeta)
        <x-partials.meta class="mt-4" :$entry />
    @endif
</header>

<section class="page__content">
    <div class="container mx-auto py-12 px-2 text-balance prose">
        {!! $entry->pageContent !!}
    </div>

    {{ $landing }}
</section>

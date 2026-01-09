@props([
    'entry',
])

<div {{ $attributes->merge(['class' => 'text-xs']) }}>
    @php($category = $entry->category->eagerly()->one())

    <p>
        @if ($category)
            <span class="font-bold">{{ $category->title }}</span>
        @endif

        <time datetime="{{ atom($entry->postDate) }}">
            {{ $entry->postDate }}
        </time>
    </p>

    <p class="text-xs">By {{ $entry->author->fullName ?? '' }}</p>
</div>

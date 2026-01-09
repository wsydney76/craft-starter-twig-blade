@php($logo = $global->logo->one())

<a
    href="{{ $siteUrl }}"
    @class([
        'text-red-600',
        'block w-12 h-12' => $global->logo,
    ])
>
    @if ($logo)
        <span class="sr-only">{{ $siteName }}</span>
        <x-pictures :photos="[$logo]" :decorative="true" />
    @else
        {{ $siteName }}
    @endif
</a>

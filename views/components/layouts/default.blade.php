@props([
    'titleBlock' => '',
    'entry',
    'language',
])

<!DOCTYPE html>
<html lang="{{ $language }}">
    <head>
        <meta name="HandheldFriendly" content="True" />
        <meta name="MobileOptimized" content="320" />
        <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="icon" href="/favicon.ico" sizes="any" />
        <link rel="icon" href="/icon.svg" type="image/svg+xml" />
        <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
        <link rel="manifest" href="/manifest.webmanifest" />
        <meta charset="utf-8" />
        <title>{{ $entry->title }}{{ $titleBlock }} | {{ $siteName }}</title>
        <meta name="referrer" content="origin-when-cross-origin" />

        {!! $craft->vite->script('/resources/js/app.js', false) !!}
    </head>
    <body class="light-mode">
        <a
            href="#main"
            class="absolute left-0 m-3 -translate-y-16 bg-slate-50 p-3 transition focus:translate-y-0"
        >
            Skip to main content
        </a>

        @cache
            <x-partials.header :$entry />
        @endcache

        <x-partials.flashes />

        <main class="page {{ $entry->slug }}" id="main" tabindex="-1">
            {{ $slot }}
        </main>

        <x-partials.footer />
    </body>
</html>

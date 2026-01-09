@props([
    'pageInfo',
])
@if (($pageInfo->prevUrl ?? null) || ($pageInfo->nextUrl ?? null))
    <nav class="pt-6 text-sm" role="navigation" aria-label="Entry pagination">
        @php
            $prevLinkSummary = ($pageInfo->currentPage ?? 1) - 1 . ' of ' . ($pageInfo->totalPages ?? 1);
            $nextLinkSummary = ($pageInfo->currentPage ?? 1) + 1 . ' of ' . ($pageInfo->totalPages ?? 1);
        @endphp

        <ul class="flex justify-between">
            @if (! empty($pageInfo->prevUrl))
                <li>
                    <a
                        href="{{ $pageInfo->prevUrl }}"
                        class="text-red-600 cursor-pointer font-bold hover:underline focus:underline"
                    >
                        ← Previous Page ({{ $prevLinkSummary }})
                    </a>
                </li>
            @endif

            @if (! empty($pageInfo->nextUrl))
                <li class="justify-self-end grow text-right">
                    <a
                        href="{{ $pageInfo->nextUrl }}"
                        class="text-red-600 cursor-pointer font-bold hover:underline focus:underline"
                    >
                        Next Page ({{ $nextLinkSummary }}) →
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif

@paginate($craft->entries()->section('blogPosts')->limit(4),'posts','pageInfo')

<x-layouts.default :entry="$entry">
    <x-slot:titleBlock>
        @if ($pageInfo->getPrevUrl() || $pageInfo->getNextUrl())
                , Page {{ $pageInfo->currentPage }} of {{ $pageInfo->totalPages }}
        @endif
    </x-slot>

    <x-layouts.page :entry="$entry">
        <x-slot:landing>
            <section class="container mx-auto mb-6 px-2 divide-y divide-slate-300">
                <div class="sm:grid sm:grid-cols-2 sm:gap-6">
                    @foreach ($posts as $post)
                        <x-teaser :post="$post" featured="true" />
                    @endforeach
                </div>
                <x-partials.pagination :pageInfo="$pageInfo" />
            </section>
        </x-slot>
    </x-layouts.page>
</x-layouts.default>

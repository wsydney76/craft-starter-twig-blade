@props([
    'entry',
    'posts',
    'pageInfo',
    'postSection',
])
<x-layouts.default :$entry>
    <x-slot:titleBlock>
        @if ($pageInfo->getPrevUrl() || $pageInfo->getNextUrl())
            , Page {{ $pageInfo->currentPage }} of
            {{ $pageInfo->totalPages }}
        @endif
    </x-slot>

    <x-layouts.page :$entry>
        <x-slot:landing>
            <div class="container mx-auto px-2 sm:grid gap-6 grid-cols-2">
                <section class="mb-12">
                    @if (count($posts))
                        <ol class="mb-2 divide-y divide-slate-300">
                            @foreach ($posts as $post)
                                <li>
                                    <x-guestbook-post :$post />
                                </li>
                            @endforeach
                        </ol>

                        <x-partials.pagination :$pageInfo />
                    @else
                        <p class="text-2xl">No entries yet. Create one using the form.</p>
                    @endif
                </section>

                <section>
                    <div class="bg-slate-200 p-6 mb-9 rounded">
                        <h2 class="font-bold text-3xl mb-4">Post an entry</h2>

                        @if ($currentUser)
                            <x-partials.post-form :sectionId="$postSection->id" />
                        @else
                            <p>You need to be signed in to post an entry in the guestbook.</p>
                            <x-partials.sign-in-form />
                        @endif
                    </div>
                </section>
            </div>
        </x-slot>
    </x-layouts.page>
</x-layouts.default>

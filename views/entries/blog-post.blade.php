<x-layouts.default :entry="$entry">
    <x-layouts.page :entry="$entry">
        <x-slot:landing>
            @php
                $posts = $craft
                    ->entries()
                    ->section('blogPosts')
                    ->id(['not', $entry->id])
                    ->limit(3)
                    ->all();
            @endphp

            <section class="bg-slate-100">
                <div class="container mx-auto divide-y divide-slate-300 py-12 px-2">
                    <h2 class="font-bold text-4xl mb-2">Other articles</h2>
                    @foreach ($posts as $post)
                        <x-teaser :post="$post" />
                    @endforeach
                </div>
            </section>
        </x-slot>
    </x-layouts.page>
</x-layouts.default>

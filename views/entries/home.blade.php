<x-layouts.default :$entry>
    <x-layouts.page :$entry>
        {!! $entry->pageContent !!}
    </x-layouts.page>
</x-layouts.default>

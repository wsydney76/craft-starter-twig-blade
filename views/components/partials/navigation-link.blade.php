@props([
    'segment1',
    'active' => false,
])

<a
    {{ $attributes }}
    @class(['block p-2 hover:text-red-600 hover:underline', 'text-red-600' => $active])
    @if($active) aria-current="page" @endif
>
    {{ $slot }}
</a>

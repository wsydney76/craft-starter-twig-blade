@props([
    'entry',
])
<header class="navigation py-6 px-2 bg-slate-50">
    <div class="sm:flex justify-between container items-center mx-auto">
        <div class="logo sm:tw-basis-1/3 font-bold p-1">
            <x-partials.logo />
        </div>
        <div>
            <x-partials.navigation :$entry />
        </div>
    </div>
</header>

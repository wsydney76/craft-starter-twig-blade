<header class="navigation py-6 px-2 bg-slate-50">
    <div class="sm:flex justify-between container items-center mx-auto">
        <div class="logo sm:tw-basis-1/3 font-bold p-1">
            <x-partials.logo />
        </div>
        <div>
            <x-partials.navigation :segment1="$craft->app->request->getSegment(1)" :entry="$entry" />
        </div>
    </div>
</header>
@props([
    'flashes' => [],
])
@if ($flashes)
    <div class="bg-red-600 text-slate-50 text-center">
        @foreach ($flashes as $level => $flash)
            <p class="{{ $level }} container mx-auto p-2 text-md">
                {{ $flash }}
            </p>
        @endforeach
    </div>
@endif

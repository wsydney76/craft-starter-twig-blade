@php use craft\helpers\Html; @endphp
@props(['photos' => [], 'decorative' => false])

@foreach ($photos as $photo)
    @if (($photo->extension ?? null) === 'svg')
        @php
            $alt = $decorative ? null : ($photo->alt ?? null);
            $role = $decorative ? null : 'img';
        @endphp

        {!! Html::modifyTagAttributes(svg($photo), [
            'role' => $role,
            'aria-label' => $alt,
        ]) !!}

    @else
        @php
            $outputWidths = [640, 1024, 1920];
            $srcsetParts = [];

            foreach ($outputWidths as $outputWidth) {
                if (($photo->width ?? 0) >= $outputWidth) {
                    $srcsetParts[] = $photo->url(['width' => $outputWidth]) . ' ' . $outputWidth . 'w';
                }
            }
        @endphp

        <picture>
            <source data-sizes="100vw" type="image/webp" />
            <img
                class="lazyload aspect-ratio-wide"
                src="{{ $photo->url }}"
                srcset="{{ implode(', ', $srcsetParts) }}"
                @if ($decorative)
                    alt=""
                @elseif (!empty($photo->alt))
                    alt="{{ $photo->alt }}"
                @endif
                sizes="100vw"
                loading="lazy"
            />
        </picture>
    @endif
@endforeach
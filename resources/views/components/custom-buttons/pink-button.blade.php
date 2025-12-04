@props([
    'type' => 'filled',   // filled | outline
])

@php
    $base = "px-6 py-2 rounded-full transition-all duration-200 font-medium";

    $styles = [
        'outline' => "
            border-2 border-roze_bloem text-roze_bloem bg-transparent
            hover:bg-roze_bloem hover:text-witte_eend
        ",

        'filled' => "
            border-2 border-roze_bloem text-witte_eend bg-roze_bloem
            hover:bg-lroze_bloem
        ",
    ];
@endphp

<button {{ $attributes->merge(['class' => $base.' '.$styles[$type]]) }}>
    {{ $slot }}
</button>

{{--voor gebruik:--}}
{{--<x-custom-buttons.roze-button type="outline">default</x-custom-buttons.roze-button>--}}
{{--<x-custom-buttons.roze-button type="filled">default</x-custom-buttons.roze-button>--}}

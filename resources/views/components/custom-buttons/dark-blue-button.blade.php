@props([
    'type' => 'filled',   // filled | outline
])

@php
    $base = "px-6 py-2 rounded-full transition-all duration-200 font-medium";

    $styles = [
        'outline' => "
            border-2 border-inkt_vis text-inkt_vis bg-transparent
            hover:bg-inkt_vis hover:text-witte_eend
        ",

        'filled' => "
            border-2 border-inkt_vis text-witte_eend bg-inkt_vis
            hover:bg-linkt_vis
        ",
    ];
@endphp

<button {{ $attributes->merge(['class' => $base.' '.$styles[$type]]) }}>
    {{ $slot }}
</button>

{{--voor gebruik:--}}
{{--<x-custom-buttons.dark-blue-button type="outline">default</x-custom-buttons.dark-blue-button>--}}
{{--<x-custom-buttons.dark-blue-button type="filled">default</x-custom-buttons.dark-blue-button>--}}

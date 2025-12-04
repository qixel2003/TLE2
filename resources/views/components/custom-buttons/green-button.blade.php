@props([
    'type' => 'filled',   // filled | outline
])

@php
    $base = "px-6 py-2 rounded-full transition-all duration-200 font-medium";

    $styles = [
        'outline' => "
            border-2 border-natuur_groen text-natuur_groen bg-transparent
            hover:bg-natuur_groen hover:text-witte_eend
        ",

        'filled' => "
            border-2 border-natuur_groen text-witte_eend bg-natuur_groen
            hover:bg-lnatuur_groen
        ",
    ];
@endphp

<button {{ $attributes->merge(['class' => $base.' '.$styles[$type]]) }}>
    {{ $slot }}
</button>

{{--voor gebruik:--}}
{{--<x-custom-buttons.green-button type="outline">default</x-custom-buttons.green-button>--}}
{{--<x-custom-buttons.green-button type="filled">default</x-custom-buttons.green-button>--}}

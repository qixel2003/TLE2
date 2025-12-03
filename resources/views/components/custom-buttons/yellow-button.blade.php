@props([
    'type' => 'filled',   // filled | outline
])

@php
    $base = "px-6 py-2 rounded-full transition-all duration-200 font-medium";

    $styles = [
        'outline' => "
            border-2 border-vitamine_D text-vitamine_D bg-transparent
            hover:bg-vitamine_D hover:text-witte_eend
        ",

        'filled' => "
            border-2 border-vitamine_D text-witte_eend bg-vitamine_D
            hover:bg-lvitamine_D
        ",
    ];
@endphp

<button {{ $attributes->merge(['class' => $base.' '.$styles[$type]]) }}>
    {{ $slot }}
</button>

{{--voor gebruik:--}}
{{--<x-custom-buttons.yellow-button type="outline">default</x-custom-buttons.yellow-button>--}}
{{--<x-custom-buttons.yellow-button type="filled">default</x-custom-buttons.yellow-button>--}}

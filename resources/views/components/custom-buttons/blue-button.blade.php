@props([
    'type' => 'filled',   // filled | outline
])

@php
    $base = "px-6 py-2 rounded-full transition-all duration-200 font-medium";

    $styles = [
        'outline' => "
            border-2 border-blauwe_vogel text-blauwe_vogel bg-transparent
            hover:bg-blauwe_vogel hover:text-witte_eend
        ",

        'filled' => "
            border-2 border-blauwe_vogel text-witte_eend bg-blauwe_vogel
            hover:bg-lblauwe_vogel
        ",
    ];
@endphp

<button {{ $attributes->merge(['class' => $base.' '.$styles[$type]]) }}>
    {{ $slot }}
</button>

{{--voor gebruik:--}}
{{--<x-custom-buttons.blue-button type="outline">default</x-custom-buttons.blue-button>--}}
{{--<x-custom-buttons.blue-button type="filled">default</x-custom-buttons.blue-button>--}}

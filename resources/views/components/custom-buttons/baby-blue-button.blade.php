@props([
    'type' => 'filled',   // filled | outline
])

@php
    $base = "px-6 py-2 rounded-full transition-all duration-200 font-medium";

    $styles = [
        'outline' => "
            border-2 border-kinder_blauw text-kinder_blauw bg-transparent
            hover:bg-kinder_blauw hover:text-witte_eend
        ",

        'filled' => "
            border-2 border-kinder_blauw text-witte_eend bg-kinder_blauw
            hover:bg-lkinder_blauw
        ",
    ];
@endphp

<button {{ $attributes->merge(['class' => $base.' '.$styles[$type]]) }}>
    {{ $slot }}
</button>

{{--voor gebruik:--}}
{{--<x-custom-buttons.baby-blue-button type="outline">default</x-custom-buttons.baby-blue-button>--}}
{{--<x-custom-buttons.baby-blue-button type="filled">default</x-custom-buttons.baby-blue-button>--}}

@props([
    'type' => 'filled',   // filled | outline
])

@php
    $base = "px-6 py-2 rounded-full transition-all duration-200 font-medium";

    $styles = [
        'outline' => "
            border-2 border-sinas_sap text-sinas_sap bg-transparent
            hover:bg-sinas_sap hover:text-witte_eend
        ",

        'filled' => "
            border-2 border-sinas_sap text-witte_eend bg-sinas_sap
            hover:bg-lsinas_sap

        ",
    ];
@endphp

<button {{ $attributes->merge(['class' => $base.' '.$styles[$type]]) }}>
    {{ $slot }}
</button>

{{--voor gebruik:--}}
{{--<x-custom-buttons.orange-button type="outline">default</x-custom-buttons.orange-button>--}}
{{--<x-custom-buttons.orange-button type="filled">default</x-custom-buttons.orange-button>--}}

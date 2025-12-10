@if($attributes->has('href'))
    <a {{ $attributes->merge(['class' => 'inline-block px-6 py-3 rounded-lg text-white font-semibold hover:opacity-90 transition-all']) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $attributes->get('type', 'button') }}"
        {{ $attributes->merge(['class' => 'inline-block px-6 py-3 rounded-lg text-white font-semibold hover:opacity-90 transition-all']) }}>
        {{ $slot }}
    </button>
@endif

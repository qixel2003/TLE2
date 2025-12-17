@extends('layouts.natuurMonumenten')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-10">

        <x-slot name="heading">
            <h1 class="text-3xl font-bold mb-8">Badges Overzicht</h1>
        </x-slot>
        <form method="GET" class="mb-8 flex flex-wrap gap-3">
            <select name="category"
                    class="px-4 py-2 border rounded-full bg-white">
                <option value="">Alle categorieën</option>
                <option value="dieren" {{ request('category')==='dieren'?'selected':'' }}>Dieren</option>
                <option value="planten" {{ request('category')==='planten'?'selected':'' }}>Planten</option>
                <option value="routes" {{ request('category')==='routes'?'selected':'' }}>Routes</option>
            </select>

            <button class="px-4 py-2 bg-indigo-600 text-white rounded-full hover:bg-indigo-700">
                Filteren
            </button>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($badges as $badge)
                <div class="bg-white rounded-2xl shadow-md border p-6 flex flex-col">

                    {{-- Badge Icon --}}
                    <div class="flex justify-center mb-4">
                        <img
                            src="{{ $badge->icon ?? 'https://via.placeholder.com/100' }}"
                            alt="{{ $badge->name }}"
                            class="w-20 h-20 object-contain"
                        >
                    </div>

                    {{-- Titel --}}
                    <h2 class="text-xl font-semibold text-gray-800 text-center">
                        {{ $badge->name }}
                    </h2>

                    {{-- Badge beschrijving --}}
                    <p class="text-gray-600 text-sm mt-2 text-center">
                        {{ $badge->description }}
                    </p>

                    {{-- Requirement --}}
                    <p class="text-gray-500 text-xs mt-3 text-center italic">
                        Voorwaarde: <span class="font-medium">{{ $badge->requirement_value }}</span> ×
                        {{ strtolower($badge->requirement_type) }}
                    </p>

                    {{-- Details button --}}
                    <div class="mt-auto pt-6">
                        <a
                            href="{{ route('badges.show', $badge) }}"
                            class="w-full block text-center px-4 py-2 rounded-full bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition"
                        >
                            Bekijk details
                        </a>
                    </div>

                </div>
            @endforeach

        </div>

    </div>
@endsection

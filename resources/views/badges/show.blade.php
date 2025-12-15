<x-layout>
        <x-slot name="heading">
        Badge Details
        </x-slot>
    <div class="max-w-3xl mx-auto px-4 py-10">

        {{-- Locked/Unlocked banner --}}
        @if(!$badge->unlocked)
            <div class="mb-6 bg-gray-100 border-l-4 border-gray-400 p-4 rounded">
                <p class="text-gray-600 text-sm">
                    🔒 Deze badge is nog niet ontgrendeld
                </p>
            </div>
        @else
            <div class="mb-6 bg-green-100 border-l-4 border-green-500 p-4 rounded">
                <p class="text-green-700 text-sm">
                    🟢 Je hebt deze badge ontgrendeld!
                </p>
            </div>
        @endif

        {{-- Header --}}
        <div class="flex flex-col items-center">
            <img
                src="{{ $badge->icon ?? 'https://via.placeholder.com/120' }}"
                class="w-32 h-32 mb-4"
                alt=""
            >
            <h1 class="text-3xl font-bold text-center mb-2">{{ $badge->name }}</h1>
        </div>

        {{-- Beschrijving --}}
        <p class="text-gray-700 text-center mb-8">
            {{ $badge->description }}
        </p>

        {{-- Requirement --}}
        <div class="text-center mb-8">
            <p class="text-gray-600 text-sm">
                Vereist:
                <span class="font-medium">{{ $badge->requirement_value }}</span> ×
                {{ strtolower($badge->requirement_type) }}
            </p>
        </div>

        {{-- PROGRESS BAR --}}
        <div>
            <p class="text-sm text-gray-700 mb-1">Voortgang</p>

            @php
                $progress = min(100, round(($userProgress / $badge->requirement_value) * 100));
            @endphp

            <div class="w-full h-5 bg-gray-200 rounded-full overflow-hidden">
                <div
                    class="h-full bg-indigo-600 transition-all duration-300"
                    style="width: {{ $progress }}%;"
                ></div>
            </div>

            <p class="text-xs text-gray-500 mt-1">
                {{ $userProgress }} / {{ $badge->requirement_value }}
            </p>
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('badges.index') }}"
               class="px-6 py-2 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium">
                ← Terug naar overzicht
            </a>
        </div>
    </div>
</x-layout>

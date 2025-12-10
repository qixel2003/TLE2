
<x-layout :heading="'Details'">

    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="mb-8">
            <a href="{{ route('routes.index') }}" class="inline-flex items-center text-green-600 hover:text-green-700 font-semibold">Terug naar alle routes</a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="h-72 md:h-80 overflow-hidden">
                @if($route->picture)
                    <img src="{{ $route->picture }}" alt="{{ $route->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-natuur_groen flex items-center justify-center">
                        <span class="text-white text-6xl">🌲</span>
                    </div>
                @endif
            </div>

            <div class="p-6 md:p-8">
                <div class="mb-6">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">{{ $route->name }}</h1>
                    <div class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-lg">{{ $route->location ?? 'Locatie onbekend' }}</span>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 mb-8">
                    <div class="bg-green-50 text-green-700 px-4 py-2 rounded-full border border-green-100">
                        <div class="flex items-center">
                            <span class="mr-2">📏</span>
                            <span class="font-semibold">{{ $route->distance ?? '0' }} km</span>
                        </div>
                    </div>

                    <div class="bg-blue-50 text-blue-700 px-4 py-2 rounded-full border border-blue-100">
                        <div class="flex items-center">
                            <span class="mr-2">⏰️</span>
                            <span class="font-semibold">{{ $route->duration ?? '0' }} min</span>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <div class="flex items-center mb-4">
                        <div class="h-1 w-12 bg-green-500 mr-4"></div>
                        <h2 class="text-2xl font-bold text-gray-800">Routebeschrijving</h2>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <p class="text-gray-700 leading-relaxed whitespace-pre-line">
                            {{ $route->description ?? 'Geen beschrijving beschikbaar' }}
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-green-600">🚶‍♂️</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Type route</h3>
                                <p class="text-gray-600">Wandelroute</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-blue-600">♿</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Toegankelijkheid</h3>
                                <p class="text-gray-600">
                                    @if(($route->difficulty ?? '') == 'makkelijk')
                                        Goed toegankelijk
                                    @else
                                        Beperkt toegankelijk
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-6">
                    <div class="flex justify-between items-center text-sm text-gray-500">
                        <div>
                            <span>Route toegevoegd op: </span>
                            @if($route->created_at)
                                <span class="font-medium">{{ $route->created_at->format('d M Y') }}</span>
                            @else
                                <span class="font-medium">Onbekende datum</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('routes.index') }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg text-center transition duration-200 shadow-md hover:shadow-lg">Start Route</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

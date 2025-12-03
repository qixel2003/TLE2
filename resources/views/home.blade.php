{{--<x-layout>--}}
<div class="min-h-screen bg-gradient-to-b from-green-50 to-blue-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Ontdek wandelroutes bij jou in de buurt</h1>
        <div class="h-1 w-24 bg-green-500 mx-auto"></div>
    </div>

    <div class="max-w-4xl mx-auto mb-12">
        <form method="GET" class="bg-white rounded-2xl shadow-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Plaats</label>
                    <select name="location" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">Alle plaatsen</option>
                        <option>Spijkenisse</option>
                        <option>Rotterdam</option>
                        <option>Putten</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Afstand</label>
                    <select name="distance" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">Alle afstanden</option>
                        <option>1km - 1,5km</option>
                        <option>2km - 5km</option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 shadow-md hover:shadow-lg">Filter</button>
                </div>
            </div>
        </form>
    </div>

    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($routes as $route)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                    <div class="h-56 overflow-hidden">
                        @if($route->image_url)
                            <img src="{{ $route->image_url }}" alt="{{ $route->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-green-400 to-blue-500 flex items-center justify-center">
                                <span class="text-white text-3xl">🌲</span>
                            </div>
                        @endif
                    </div>

                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h2 class="text-xl font-bold text-gray-800 mb-1">{{ $route->name }}</h2>
                                <p class="text-gray-600 text-sm">
                                    <span class="font-medium">Locatie:</span> {{ $route->location }}
                                </p>
                            </div>
                            <span class="text-yellow-500 text-lg">{{ $route->difficulty }}</span>
                        </div>

                        <div class="flex items-center space-x-4 text-sm text-gray-600 mb-4">
                            <div class="flex items-center">
                                <span class="mr-1">📏</span>
                                <span>{{ $route->distance }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="mr-1">⏱️</span>
                                <span>{{ $route->duration }}</span>
                            </div>
                        </div>

                        <p class="text-gray-700 mb-6 line-clamp-3">
                            {{ $route->description }}
                        </p>

                        <div class="flex justify-between items-center">
                            <a href="{{ route('routes.show', $route) }}" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                                Bekijk route
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                            <span class="text-xs text-gray-500">{{ $route->created_at->format('d M') }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 bg-white rounded-xl shadow-sm">
                    <div class="text-5xl mb-4">🌿</div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">Geen routes gevonden</h3>
                    <p class="text-gray-600 mb-6">Zodra er routes beschikbaar zijn verschijnen ze hier!</p>
                    <a href="{{ route('routes.create') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200">
                        Voeg eerste route toe</a>
                </div>
            @endforelse
        </div>
    </div>

{{--    @if($routes->hasPages())--}}
{{--        <div class="mt-12 flex justify-center">--}}
{{--            <div class="bg-white px-4 py-3 rounded-lg shadow-sm">--}}
{{--                {{ $routes->links() }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}

</div>
{{--</x-layout>--}}

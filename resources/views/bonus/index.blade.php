{{--layout veranderen--}}
<x-layout :heading="'Bonus'">
{{--    <div class="min-h-screen py-8 px-4 sm:px-4 lg:px-8"></div>--}}
    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Bonus Opdrachten</h1>

    <a href="create.blade.php">Opdracht aanmaken</a>


{{--        <div class="max-w-7xl mx-auto">--}}
{{--            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">--}}
{{--                @forelse ($routes as $route)--}}
{{--                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1">--}}
{{--                        <div class="h-56 overflow-hidden">--}}
{{--                            @if($route->picture)--}}
{{--                                <img src="{{ $route->picture }}" alt="{{ $route->name }}" class="w-full h-full object-cover">--}}
{{--                            @else--}}
{{--                                <div class="w-full h-full bg-natuur_groen flex items-center justify-center">--}}
{{--                                    <span class="text-white text-3xl">🌲</span>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}

{{--                        <div class="p-6">--}}
{{--                            <div class="flex justify-between items-start mb-3">--}}
{{--                                <div>--}}
{{--                                    <h2 class="text-xl font-bold text-gray-800 mb-1">{{ $route->name }}</h2>--}}
{{--                                    <p class="text-gray-600 text-sm">--}}
{{--                                        <span class="font-medium">Locatie:</span> {{ $route->location }}--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <span class="text-yellow-500 text-lg">{{ $route->difficulty }}</span>--}}
{{--                            </div>--}}

{{--                            <div class="flex items-center space-x-4 text-sm text-gray-600 mb-4">--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <span>{{ $route->distance }}</span>--}}
{{--                                </div>--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <span>{{ $route->duration }}</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <p class="text-gray-700 mb-6 line-clamp-3">--}}
{{--                                {{ $route->description }}--}}
{{--                            </p>--}}

{{--                            <div class="flex justify-between items-center">--}}
{{--                                <a href="{{ route('routes.show', $route) }}" class="text-green-600 hover:text-green-700 font-semibold flex items-center">Bekijk route</a>--}}
{{--                                <a href="{{ route('routes.edit', $route) }}" class="text-blue-600 hover:text-blue-700 font-semibold flex items-center">Bewerken</a>--}}
{{--                                <span class="text-xs text-gray-500">{{ $route->created_at->format('d M') }}</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @empty--}}
{{--                    <div class="col-span-full text-center py-16 bg-white rounded-xl shadow-sm">--}}
{{--                        <h3 class="text-2xl font-bold text-gray-700 mb-2">Geen routes gevonden</h3>--}}
{{--                        <p class="text-gray-600 mb-6">Zodra er routes beschikbaar zijn verschijnen ze hier!</p>--}}
{{--                        <a href="{{ route('routes.create') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200">--}}
{{--                            Voeg eerste route toe</a>--}}
{{--                    </div>--}}
{{--                @endforelse--}}
{{--            </div>--}}
{{--        </div>--}}
</x-layout>


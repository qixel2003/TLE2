@extends('layouts.natuurMonumenten')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-8">

        <div class="mb-8">
            <a href="{{ route('routes.index') }}"
               class="inline-flex items-center text-green-600 hover:text-kinder_blauw font-semibold">
                Terug naar alle routes
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

            <div class="h-72 md:h-80 overflow-hidden">
                @if($route->image)
                    <img src="{{ $route->image }}"
                         alt="{{ $route->name }}"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-natuur_groen flex items-center justify-center">
                        <span class="text-white text-6xl">🌲</span>
                    </div>
                @endif
            </div>

            <div class="p-6 md:p-8">

                <div class="mb-6">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">
                        {{ $route->name }}
                    </h1>

                    <div class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>

                        <span class="text-lg">
                            {{ $route->location ?? 'Locatie onbekend' }}
                        </span>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 mb-8">

                    <div class="bg-lnatuur_groen px-4 py-2 rounded-full ">
                        <div class="flex items-center">
                            <span class="mr-2">📏</span>
                            <span class="font-semibold">
                                {{ $route->distance ?? '0' }} km
                            </span>
                        </div>
                    </div>

                    <div class="bg-lkinder_blauw px-4 py-2 rounded-full ">
                        <div class="flex items-center">
                            <span class="mr-2">⏰️</span>
                            <span class="font-semibold">
                                {{ $route->duration ?? '0' }} min
                            </span>
                        </div>
                    </div>

                </div>

                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">
                        Routebeschrijving
                    </h2>

                    <div class="bg-gray-50 rounded-xl p-6 shadow-lg">
                        <p class="text-gray-700 leading-relaxed">
                            {{ $route->description ?? 'Geen beschrijving beschikbaar' }}
                        </p>
                    </div>
                </div>

                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">
                        Verhaal
                    </h2>

                    <div class="bg-gray-50 rounded-xl p-6 bg-inkt_vis text-witte_eend">

                        <img
                            src="{{ asset('images/free-icon-bird-3338342.png') }}"
                            alt="Een vogel icoon"
                            class="w-20 h-20 float-right ml-4 mb-2"
                        >

                        <p class="text-gray-700 leading-relaxed">
                            De polder lijkt rustig… maar er gebeurt van alles. Vogels vliegen onrustig rond, insecten krioelen tussen de bloemen, langs de sloot en kikkers bewegen onder het wateroppervlak. Polders en bosjes vormen veilige plekken voor dieren.
                        </p>
                        <p class="mt-4">
                            Jij bent hier niet zomaar een wandelaar. Elke stap telt: blijf op de paden, laat de bloemen bloeien en verstoor de natuur niet. Zo help jij de polder levendig en gezond te houden.
                        </p>

                        <div class="clear-both"></div>
                    </div>
                </div>

                {{-- missie --}}
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">
                        Jouw missie
                    </h2>

                    <img
                        src="{{ asset('images/free-icon-goal-5987327.png') }}"
                        alt="Een vogel icoon"
                        class="w-20 h-20 float-right ml-2 mb-2 mt-9 mr-2"
                    >

                    <div class="bg-gray-50 rounded-xl p-6 bg-roze_bloem text-witte_eend mb-4">
                        <p class="text-gray-700 leading-relaxed">
                            Tijdens deze route ga je op ontdekkingstocht door de polder. Spot water, vogels én bloemen. Begrijp hoe ze samenleven en ontdek hoe jouw gedrag de natuur kan beschermen. Let goed op de aanwijzingen langs het pad en gebruik je zintuigen om de natuur te ervaren.
                        </p>
                    </div>



                <div class="border-t border-gray-200 pt-6">
                    <div class="flex justify-between items-center text-sm text-gray-500">
                        <div>
                            <span>Route toegevoegd op: </span>
                            <span class="font-medium">
                                {{ $route->created_at?->format('d M Y') ?? 'Onbekende datum' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <form method="POST"
                          action="{{ route('routes.start', $route) }}"
                          class="flex-1 bg-natuur_groen hover:bg-lnatuur_groen text-witte_eend font-semibold py-3 px-6 rounded-lg text-center transition duration-200 shadow-md hover:shadow-lg">
                        @csrf
                        <button type="submit">Start Route</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

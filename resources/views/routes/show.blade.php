@extends('layouts.natuurMonumenten')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-8">

        {{-- Terug link --}}
        <div class="mb-8">
            <a
                href="{{ route('routes.index') }}"
                class="inline-flex items-center font-semibold underline text-green-700 hover:text-kinder_blauw
                       focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
            >
                Terug naar alle routes
            </a>
        </div>

        <article class="bg-white rounded-2xl shadow-xl overflow-hidden">

            {{-- Afbeelding --}}
            <div class="h-72 md:h-80 overflow-hidden">
                @if($route->image)
                    <img
                        src="{{ $route->image }}"
                        alt="Foto van de route {{ $route->name }}"
                        class="w-full h-full object-cover"
                    >
                @else
                    <div
                        class="w-full h-full bg-natuur_groen flex items-center justify-center"
                        aria-hidden="true"
                    >
                        <span class="text-witte_eend text-6xl">🌲</span>
                    </div>
                @endif
            </div>

            <div class="p-6 md:p-8">

                {{-- Titel & locatie --}}
                <header class="mb-6">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">
                        {{ $route->name }}
                    </h1>

                    <div class="flex items-center text-gray-700">
                        <svg
                            class="w-5 h-5 mr-2 text-green-700"
                            aria-hidden="true"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>

                        <span class="text-lg">
                            {{ $route->location ?? 'Locatie onbekend' }}
                        </span>
                    </div>
                </header>

                {{-- Route eigenschappen --}}
                <ul class="flex flex-wrap gap-3 mb-8" aria-label="Route eigenschappen">

                    <li class="bg-lnatuur_groen px-4 py-2 rounded-full">
                        <span aria-hidden="true" class="mr-2">📏</span>
                        <span class="font-semibold">
                            Afstand: {{ $route->getFormattedDistance() }}
                        </span>
                    </li>

                    <li class="bg-lkinder_blauw px-4 py-2 rounded-full">
                        <span aria-hidden="true" class="mr-2">⏰</span>
                        <span class="font-semibold">
                            Duur: {{ $route->getFormattedDuration() }}
                        </span>
                    </li>

                </ul>

                {{-- Routebeschrijving --}}
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">
                        Routebeschrijving
                    </h2>

                    <div class="bg-gray-50 rounded-xl p-6 shadow-lg">
                        <p class="text-gray-800 leading-relaxed">
                            {{ $route->description ?? 'Geen beschrijving beschikbaar.' }}
                        </p>
                    </div>
                </section>

                {{-- Verhaal --}}
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">
                        Verhaal
                    </h2>

                    <div class="bg-inkt_vis rounded-xl p-6 text-witte_eend">

                        <img
                            src="{{ asset('images/free-icon-bird-3338342.png') }}"
                            alt=""
                            aria-hidden="true"
                            class="w-20 h-20 float-right ml-4 mb-2"
                        >

                        <p class="leading-relaxed">
                            De polder lijkt rustig… maar er gebeurt van alles. Vogels vliegen rond,
                            insecten krioelen snel tussen de bloemen en kikkers bewegen rap onder het wateroppervlak. Polders en bosjes vormen veilige plekken voor dieren tegen hun vijanden.
                        </p>

                        <p class="mt-4">
                            Jij bent hier niet zomaar een wandelaar. Elke stap telt. Help jij de kwetsbare dieren tegen gevaar?
                        </p>

                        <div class="clear-both"></div>
                    </div>
                </section>

                {{-- Missie --}}
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">
                        Jouw missie
                    </h2>

                    <img
                        src="{{ asset('images/free-icon-goal-5987327.png') }}"
                        alt=""
                        aria-hidden="true"
                        class="w-20 h-20 float-right ml-2  mt-4 mr-2"
                    >

                    <div class="bg-roze_bloem rounded-xl p-6 text-witte_eend mb-4">
                        <p class="leading-relaxed">
                            Tijdens deze route ga je op ontdekkingstocht door de polder. Spot water,
                            vogels en bloemen en ontdek hoe jouw gedrag de natuur kan beschermen.
                        </p>
                    </div>

                    <div class="clear-both"></div>
                </section>

                {{-- Metadata --}}
                <footer class="border-t border-gray-200 pt-6 text-sm text-gray-600">
                    <span>Route toegevoegd op: </span>
                    <span class="font-medium">
                        {{ $route->created_at?->format('d M Y') ?? 'Onbekende datum' }}
                    </span>
                </footer>

                {{-- Start route --}}
                <div class="mt-8 pt-6 border-t border-gray-200">
                    @if(auth()->user()->isStudent())
                    <form method="POST" action="{{ route('routes.start', $route) }}">
                        @csrf
                        <button
                            type="submit"
                            class="w-full bg-natuur_groen hover:bg-lnatuur_groen text-witte_eend
                                   font-semibold py-3 px-6 rounded-lg transition
                                   shadow-md hover:shadow-lg
                                   focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
                        >
                            Start route
                        </button>
                    </form>
                    @else
                        <p class="text-center text-gray-500">
                            Log in als student om deze route te starten.
                        </p>
                    @endif
                </div>

            </div>
        </article>
    </div>
@endsection

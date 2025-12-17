@extends('layouts.natuurMonumenten')

@section('content')
    <section class="max-w-4xl mx-auto space-y-8">

        {{-- Pagina titel --}}
        <header>
            <h1 class="text-3xl font-bold text-center">
                Profiel
            </h1>
        </header>

        <section
            class="bg-natuur_groen text-witte_eend rounded-2xl p-6 shadow"
            aria-labelledby="profielgegevens">

            <h2 id="profielgegevens" class="text-xl font-semibold mb-4">
                Profielgegevens
            </h2>

            <div class="flex items-center gap-4">

                <img
                    src="{{ asset('storage/photos/childicon.png') }}"
                    alt="Avatar profiel"
                    class="w-20 h-20 rounded-full bg-white p-1 flex-shrink-0">


                <div class="flex flex-col gap-2">

                    <div class="flex gap-6">
                        <div>
                            <p class="text-sm opacity-80">Naam</p>
                            <p class="font-semibold">
                                {{ $user->firstname }} {{ $user->lastname }}
                            </p>
                        </div>

                        @if($authStudent)
                            <div>
                                <p class="text-sm opacity-80">Klas</p>
                                <p class="font-semibold">
                                    {{ $user->student->classroom->name ?? 'Onbekend' }}
                                </p>
                            </div>
                        @endif
                    </div>


                    @if($authStudent)
                        <div class="flex gap-6">
                            <div>
                                <p class="text-sm opacity-80">School</p>
                                <p class="font-semibold">
                                    {{ $user->student->school->name ?? 'Onbekend' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm opacity-80">Punten</p>
                                <p class="font-semibold">
                                    {{ $user->student->points ?? 0 }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>

                <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold transition whitespace-nowrap">
                        Uitloggen
                    </button>
                </form>
            </div>

            @if($authTeacher)
                <div class="mt-4 space-y-2">
                    @foreach($user->school as $school)
                        <p>
                            <span class="font-semibold">School accountbeheerder:</span><br>
                            {{ optional($school->user->firstWhere('role', 1))->email ?? 'Niet bekend' }}
                        </p>

                        <a href="{{ route('school.dashboard') }}">
                            <x-custom-buttons.dark-blue-button>
                                School pagina
                            </x-custom-buttons.dark-blue-button>
                        </a>
                    @endforeach
                </div>
            @endif
        </section>

        @if($authStudent)
            <section
                class="bg-inkt_vis text-witte_eend rounded-2xl p-6 shadow"
                aria-labelledby="route-info"
            >
                <h2 id="route-info" class="text-xl font-semibold mb-4">
                    Route
                </h2>

                <div class="grid grid-cols-3 text-center mb-6">
                    <div>
                        <p class="text-sm opacity-80">Aantal</p>
                        <p class="text-lg font-bold">
                            {{ $authStudent->activeRoutes->count() }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm opacity-80">Kilometers</p>
                        <p class="text-lg font-bold">
                            {{ $authStudent->activeRoutes->sum(fn($r) => $r->route->distance ?? 0) }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm opacity-80">Tijd</p>
                        <p class="text-lg font-bold">
                            {{ round($authStudent->activeRoutes->sum(fn($r) => $r->route->duration ?? 0) / 60, 1) }} uur
                        </p>
                    </div>
                </div>

                {{-- Route lijst --}}
{{--                @if($authStudent->activeRoutes->count() > 0)--}}
{{--                    <div class="space-y-3 mb-6">--}}
{{--                        @foreach($authStudent->activeRoutes as $active_route)--}}
{{--                            <div class="bg-white text-gray-800 rounded-xl p-4">--}}

{{--                                <p class="font-semibold mb-2">--}}
{{--                                    {{ $active_route->route->name ?? 'Geen naam' }}--}}
{{--                                </p>--}}

{{--                                <div class="grid grid-cols-2 text-sm">--}}
{{--                                    <div>--}}
{{--                                        <p class="opacity-70">Moeilijkheid</p>--}}
{{--                                        <p class="font-medium">--}}
{{--                                            {{ $active_route->route->difficulty ?? 'NVT' }}--}}
{{--                                        </p>--}}
{{--                                    </div>--}}

{{--                                    <div>--}}
{{--                                        <p class="opacity-70">Status</p>--}}
{{--                                        <p class="font-medium">--}}
{{--                                            {{ $active_route->is_completed ? 'Afgerond' : 'Bezig' }}--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <p>Geen actieve routes gevonden.</p>--}}
{{--                @endif--}}

                <div class="text-center">
                    <a href="{{ route('routes.index') }}">
                        <x-custom-buttons.blue-button>
                            Bekijk details
                        </x-custom-buttons.blue-button>
                    </a>
                </div>
            </section>
        @endif


        <section
            class="p-6 bg-sinas_sap text-witte_eend rounded-lg shadow"
            aria-labelledby="badges"
        >
            <h2 id="badges" class="text-xl font-semibold mb-4">
                Badges
            </h2>

            @if(($badges ?? collect())->count())
                <ul class="grid grid-cols-2 sm:grid-cols-3 gap-4" role="list">
                    @foreach($badges as $badge)
                        <li class="bg-white text-gray-800 rounded-xl p-3 flex flex-col items-center shadow">
                            <img
                                src="{{ $badge->icon }}"
                                alt="{{ $badge->name }}"
                                class="w-16 h-16 mb-2 object-contain"
                            >
                            <p class="text-sm font-semibold text-center">
                                {{ $badge->name }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="italic">Nog geen badges verdiend</p>
            @endif

            <div class="mt-4 text-center">
                <x-custom-buttons.pink-button>
                    Bekijk alle
                </x-custom-buttons.pink-button>
            </div>
        </section>

    </section>
@endsection

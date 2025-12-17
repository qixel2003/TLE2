@extends('layouts.natuurMonumenten')

@section('content')
    <section class="max-w-4xl mx-auto space-y-8">

        {{-- Pagina titel --}}
        <header>
            <h1 class="text-3xl font-bold">
                Profiel van {{ $user->firstname }} {{ $user->lastname }}
            </h1>
        </header>

        {{-- Profielgegevens --}}
        <section
            class="p-6 bg-natuur_groen text-witte_eend rounded-lg shadow"
            aria-labelledby="profielgegevens"
        >
            <h2 id="profielgegevens" class="text-xl font-semibold mb-4">
                Profielgegevens
            </h2>

            <dl class="space-y-2">
                <div>
                    <dt class="font-semibold">Naam</dt>
                    <dd>{{ $user->firstname }} {{ $user->lastname }}</dd>
                </div>

                @if($authStudent)
                    <div>
                        <dt class="font-semibold">Klas</dt>
                        <dd>{{ $user->student->classroom->name ?? 'Onbekend' }}</dd>
                    </div>

                    <div>
                        <dt class="font-semibold">School</dt>
                        <dd>{{ $user->student->school->name ?? 'Onbekend' }}</dd>
                    </div>

                    <div>
                        <dt class="font-semibold">Punten</dt>
                        <dd>{{ $user->student->points ?? 0 }}</dd>
                    </div>
                @endif
            </dl>

            @if($authTeacher)
                <div class="mt-4 space-y-2">
                    @foreach($user->school as $school)
                        <p>
                            <span class="font-semibold">School accountbeheerder:</span>
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

        {{-- Actieve routes --}}
        @if($authStudent)
            <section
                class="p-6 bg-inkt_vis text-witte_eend rounded-lg shadow"
                aria-labelledby="actieve-routes"
            >
                <h2 id="actieve-routes" class="text-xl font-semibold mb-4">
                    Mijn actieve routes
                </h2>

                @if($authStudent->activeRoutes->count() > 0)
                    <ul class="space-y-4" role="list">
                        @foreach($authStudent->activeRoutes as $active_route)
                            <li class="p-4 bg-white text-gray-800 rounded-lg">

                                <dl class="grid grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <dt class="font-semibold">Route</dt>
                                        <dd>{{ $active_route->route->name ?? 'Geen naam' }}</dd>
                                    </div>

                                    <div>
                                        <dt class="font-semibold">Moeilijkheid</dt>
                                        <dd>{{ $active_route->route->difficulty ?? 'NVT' }}</dd>
                                    </div>

                                    <div>
                                        <dt class="font-semibold">Afstand</dt>
                                        <dd>{{ $active_route->route->distance ?? 'NVT' }} km</dd>
                                    </div>

                                    <div>
                                        <dt class="font-semibold">Duur</dt>
                                        <dd>{{ $active_route->route->duration ?? 'NVT' }} min</dd>
                                    </div>

                                    <div>
                                        <dt class="font-semibold">Status</dt>
                                        <dd>{{ $active_route->is_completed ? 'Afgerond' : 'Bezig' }}</dd>
                                    </div>
                                </dl>

                                <a href="{{ route('routes.show', $active_route->route_id) }}" class="mt-3 inline-block">
                                    <x-custom-buttons.blue-button>
                                        Bekijk route
                                    </x-custom-buttons.blue-button>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Geen actieve routes gevonden.</p>
                @endif
            </section>
        @endif

        {{-- Badges --}}
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

            <div class="mt-4">
                <x-custom-buttons.pink-button>
                    Bekijk alle
                </x-custom-buttons.pink-button>
            </div>
        </section>

    </section>
@endsection

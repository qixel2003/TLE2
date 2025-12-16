<x-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <x-slot:heading>
                Profiel van {{ $user->firstname }} {{ $user->lastname }}
            </x-slot:heading>
        </h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-natuur_groen text-witte_eend shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <p>Naam: {{ $user->firstname }} {{ $user->lastname }} </p>
                    @if($authStudent)
                        <p>Klas: {{ $user->student->classroom->name ?? 0}}</p>
                        <p>School: {{ $user->student->school->name ?? 0}}</p>
                        <p>Punten: {{ $user->student->points ?? 0}}</p>
                    @else
                        @if($authTeacher)
                            @foreach($user->school as $school)
                                <p><strong>School account
                                        beheerder:</strong> {{ optional($school->user->firstWhere('role', 1))->email ?? 'Niet bekend' }}
                                </p>
                                <a href="{{ route('school.dashboard') }}"> <x-custom-buttons.dark-blue-button> School pagina </x-custom-buttons.dark-blue-button></a>
                            @endforeach
                        @endif
                    @endif


                </div>
            </div>

            <div class="p-4 sm:p-8 bg-inkt_vis text-witte_eend shadow sm:rounded-lg">
                <div class="max-w-xl flex flex-col gap-5">


                    <h2>Routes</h2>
                    <h2>Mijn actieve routes</h2>

                    @if($authStudent && $authStudent->activeRoutes->count() > 0)
                        @foreach($authStudent->activeRoutes as $active_route)
                            <div class="flex flex-row gap-5">
                                <div>
                                    <h3>Route:</h3>
                                    <p>{{ $active_route->route->name ?? 'Geen naam' }}</p>
                                </div>
                                <div>
                                    <h3>Graad:</h3>
                                    <p>{{ $active_route->route->difficulty ?? 'NVT' }}</p>
                                </div>
                                <div>
                                    <h3>Kilometers:</h3>
                                    <p>{{ $active_route->route->distance ?? 'NVT' }} km</p>
                                </div>
                                <div>
                                    <h3>Tijd:</h3>
                                    <p>{{ $active_route->route->duration ?? 'NVT' }} min</p>
                                </div>
                                <div>
                                    <h3>Status:</h3>
                                    <p>{{ $active_route->is_completed ? 'Afgerond' : 'Bezig' }}</p>
                                </div>
                            </div>

                            <a href="{{ route('routes.show', $active_route->route_id) }}">
                                <x-custom-buttons.blue-button>
                                    Bekijk route
                                </x-custom-buttons.blue-button>
                            </a>
                        @endforeach
                    @else
                        <p>Geen actieve routes gevonden.</p>
                    @endif


                </div>
            </div>

            <div class="p-4 sm:p-8 bg-sinas_sap text-witte_eend shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-xl font-bold mb-4">Badges</h2>
                @if(($badges ?? collect())->count())
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-6">
                            @foreach($badges as $badge)
                                <div class="bg-white text-gray-800 rounded-xl p-3 flex flex-col items-center shadow">
                                    <div class="w-16 h-16 mb-2">
                                        <img
                                            src="{{ $badge->icon}}"
                                            alt="{{ $badge->name }}"
                                            class="w-full h-full object-contain"/>
                                    </div>

                                    <p class="text-sm font-semibold text-center">
                                        {{ $badge->name }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm italic mb-4">Nog geen badges verdiend</p>
                    @endif

                    <x-custom-buttons.pink-button>
                        Bekijk alle
                    </x-custom-buttons.pink-button>
                </div>
            </div>
        </div>
    </div>
</x-layout>

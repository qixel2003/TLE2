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
                    <p>Klas: {{ $user->student->classroom->name}}</p>
                    <p>School: {{ $user->student->school->name}}</p>
                    <p>Punten: {{ $user->student->points}}</p>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-inkt_vis text-witte_eend shadow sm:rounded-lg">
                <div class="max-w-xl flex flex-col gap-5">


                    <h2>Routes</h2>
                    @foreach($active_routes as $active_route)
                        <div class="flex flex-row gap-5">
                            <div>
                                <h3>Aantal:</h3>
                                <p>{{ $active_route->count() }}</p>
                            </div>
                            <div>
                                <h3>Route:</h3>
                                <p>{{ $active_route->route->name }}</p>
                            </div><div>
                                <h3>Graad:</h3>
                                <p>{{ $active_route->route->difficulty }}</p>
                            </div>
                            <div>
                                <h3>Kilometers:</h3>
                                <p>{{ $active_route->route->distance }}</p>
                            </div>
                            <div>
                                <h3>Minuten:</h3>
                                <p>{{ $active_route->route->duration }}</p>
                            </div>
                            <div>
                                <h3>Status:</h3>
                                <p>{{ (bool)$active_route->is_completed ? 'Afgerond' : 'Bezig'}}</p>
                            </div>
                        </div>
                        <a class="" href="{{ route('routes.show', $active_route->route_id) }}">
                            <x-custom-buttons.blue-button>
                                Bekijk route
                            </x-custom-buttons.blue-button>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-sinas_sap text-witte_eend shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <p>badges</p>
                    <x-custom-buttons.pink-button>Bekijk alle</x-custom-buttons.pink-button>
                    {{--                    @include('profile.partials.delete-user-form')--}}
                </div>
            </div>
        </div>
    </div>
</x-layout>

@extends('layouts.natuurMonumenten')

@section('content')
    <div class="max-w-3xl mx-auto">

        <h1 class="text-3xl font-bold mb-4 text-center">
            Gefeliciteerd!
        </h1>

        <p class="text-lg mb-6 text-center">
            Je hebt je route afgerond!
        </p>

        <div class="bg-white p-6 rounded-lg flex flex-col snap-center">

            <h2 class="text-2xl font-semibold mb-4">
                Route statistieken
            </h2>

            <div class="grid grid-cols-2 gap-4 text-sm">

                <div>
                    <p class="font-semibold">Route naam:</p>
                    <p>{{ $activeRoute->route->name }}</p>
                </div>

                <div>
                    <p class="font-semibold">Je rol:</p>
                    <p>{{ $activeRoute->getRoleName() }}</p>
                </div>

                <div>
                    <p class="font-semibold">Locatie:</p>
                    <p>{{ $activeRoute->route->location }}</p>
                </div>

                <div>
                    <p class="font-semibold">Afstand:</p>
                    <p>{{ $activeRoute->route->distance }} km</p>
                </div>

                <div>
                    <p class="font-semibold">Duratie:</p>
                    <p>{{ $activeRoute->route->duration }} minuten</p>
                </div>

                <div>
                    <p class="font-semibold">Moeilijkheidsgraad:</p>
                    <p>{{ ucfirst($activeRoute->route->difficulty) }}</p>
                </div>

            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('routes.index') }}"
                    class="inline-block bg-natuur_groen hover:bg-green-700 text-witte_eend font-semibold py-2 px-6 rounded-lg">
                    Terug naar Home
                </a>
            </div>

        </div>
    </div>
@endsection

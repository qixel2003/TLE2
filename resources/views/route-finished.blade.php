@extends('layouts.natuurMonumenten')

@section('content')
    <div class="max-w-3xl mx-auto">

        <h1 class="text-3xl font-bold mb-4 text-center">
            Gefeliciteerd!
        </h1>

        <p class="text-lg mb-6 text-center">
            Je hebt je route afgerond!
        </p>

        <section class="bg-white p-6 rounded-lg flex flex-col">

            <h2 class="text-2xl font-semibold mb-6 text-center">
                Route statistieken
            </h2>

            <dl class="grid grid-cols-2 gap-6 text-sm">

                <div>
                    <dt class="font-semibold text-gray-800">
                        Route naam
                    </dt>
                    <dd>
                        {{ $activeRoute->route->name }}
                    </dd>
                </div>

                <div>
                    <dt class="font-semibold text-gray-800">
                        Je rol
                    </dt>
                    <dd>
                        {{ $activeRoute->getRoleName() }}
                    </dd>
                </div>

                <div>
                    <dt class="font-semibold text-gray-800">
                        Locatie
                    </dt>
                    <dd>
                        {{ $activeRoute->route->location }}
                    </dd>
                </div>

                <div>
                    <dt class="font-semibold text-gray-800">
                        Afstand
                    </dt>
                    <dd>
                        {{ $activeRoute->route->distance }} km
                    </dd>
                </div>

                <div>
                    <dt class="font-semibold text-gray-800">
                        Duur
                    </dt>
                    <dd>
                        {{ $activeRoute->route->duration }} minuten
                    </dd>
                </div>

                <div>
                    <dt class="font-semibold text-gray-800">
                        Moeilijkheidsgraad
                    </dt>
                    <dd>
                        {{ ucfirst($activeRoute->route->difficulty) }}
                    </dd>
                </div>

            </dl>

            <div class="mt-8 text-center">
                <a
                    href="{{ route('routes.index') }}"
                    class="inline-block bg-natuur_groen hover:bg-green-700 text-witte_eend
                           font-semibold py-2 px-6 rounded-lg
                           focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
                    Terug naar Home
                </a>
            </div>

        </section>
    </div>
@endsection

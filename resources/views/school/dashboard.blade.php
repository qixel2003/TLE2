@extends('layouts.natuurMonumenten')

@section('content')
    <div class="max-w-md mx-auto mt-8 space-y-6">

        {{-- Header / profiel --}}
        <div class="bg-natuur_groen text-witte_eend rounded-2xl p-5 shadow">
            <h1 class="text-lg font-bold">School dashboard</h1>
            <p class="text-sm opacity-90">
                @foreach($schools as $school)
                    Beheerder:
                    {{ optional($school->user->firstWhere('role', 1))->email ?? 'Niet bekend' }}
                    @break
                @endforeach
            </p>
        </div>

        {{-- Info card (zoals grijze kaart in screenshot) --}}
        <div class="bg-witte_eend rounded-xl p-4 shadow">
            <p class="text-sm text-inkt_vis">
                Je bent ingelogd en kunt hier je scholen beheren.
            </p>
        </div>

        {{-- School aanmelden (+ knop) --}}
        <a href="{{ route('school.create') }}"
           class="block bg-roze_bloem hover:bg-lroze_bloem text-white text-center font-bold rounded-xl py-3 shadow transition">
            +
        </a>

        {{-- Scholen lijst --}}
        <div class="space-y-4">
            @foreach($schools as $school)
                <a href="{{ route('school.show', $school) }}" class="block">
                    <div class="bg-inkt_vis text-witte_eend rounded-xl p-4 shadow hover:bg-linkt_vis transition">
                        <h2 class="text-lg font-bold mb-2">
                            {{ $school->name }}
                        </h2>

                        <div class="bg-witte_eend text-inkt_vis rounded-lg p-3 mb-3 space-y-1">
                            <p class="text-sm">
                                Aantal punten: {{ $school->points ?? 0 }}
                            </p>
                            <p class="text-sm">
                                Aantal gelopen routes: {{ $school->points ?? 0 }}
                            </p>
                        </div>

                        <p class="text-sm">
                            <strong>Docent:</strong>
                            {{ optional($school->user->firstWhere('role', 1))->firstname ?? 'Niet bekend' }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
@endsection

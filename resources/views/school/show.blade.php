@extends('layouts.natuurMonumenten')

@section('content')
    <div class="max-w-md mx-auto mt-8 space-y-6">

        {{-- School / profiel card --}}
        <div class="bg-natuur_groen text-witte_eend rounded-2xl p-5 shadow">
            <h1 class="text-xl font-bold">{{ $school->name }}</h1>
            <p class="text-sm opacity-90">
                Docent:
                {{ optional($school->user->firstWhere('role', 1))->firstname ?? 'Niet bekend' }}
            </p>
        </div>

        {{-- Overzicht card --}}
        <div class="bg-inkt_vis text-witte_eend rounded-xl p-4 flex justify-between items-center">
            <span class="font-medium">
                Klassen: {{ $classrooms->count() }}
            </span>
            <span class="text-sm">
                Leerlingen: {{ $classrooms->sum(fn($c) => $c->students->count()) }}
            </span>
        </div>

        {{-- Add classroom --}}
        <a href="{{ route('classrooms.create') }}"
           class="block  hover:bg-roze_bloem text-white text-center font-bold rounded-xl py-3 shadow transition">
            +
        </a>

        {{-- Klassen lijst --}}
        <div class="space-y-4">
            @foreach($classrooms as $classroom)
                <div class="bg-witte_eend dark:bg-gray-800 rounded-xl shadow p-4 flex justify-between items-center">
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100">
                            {{ $classroom->name }}
                        </h3>
                        <p class="text-sm text-gray-500">
                            Leerlingen:
                            {{ $classroom->students->count() ?: 'Geen leerlingen' }}
                        </p>
                    </div>

                    <a href="{{ route('classrooms.show', $classroom) }}"
                       class="bg-natuur_groen hover:bg-natuur_groen text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                        Bekijk
                    </a>
                </div>
            @endforeach
        </div>

        {{-- Acties --}}
        <div class="flex gap-3 pt-4">
            <a href="{{ route('school.edit', $school) }}"
               class="flex-1 bg-inkt_vis hover:bg-kinder_blauw text-witte_eend text-center rounded-lg py-2">
                Bewerken
            </a>

            <form method="POST" action="{{ route('school.destroy', $school->id) }}" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="w-full bg-sinas_sap hover:bg-lsinas_sap text-witte_eend rounded-lg py-2">
                    Verwijderen
                </button>
            </form>
        </div>

        <a href="{{ route('school.dashboard') }}"
           class="block text-center  hover:underline text-sm pt-2">
            ← Terug
        </a>

    </div>
@endsection

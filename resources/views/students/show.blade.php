@extends('layouts.natuurMonumenten')

@section('content')
<div class="min-h-screen bg-kinder_blauw flex flex-col items-center p-4">

    <div class="w-full max-w-sm bg-witte_eend rounded-xl shadow-lg overflow-hidden">

        <div class="bg-inkt_vis text-witte_eend text-center py-3 font-semibold text-lg">
            Natuurmonumenten
        </div>

        <div class="p-4 flex flex-col gap-4">

            <div class="bg-natuur_groen text-witte_eend rounded-lg p-4 flex flex-col items-center gap-2">
                <h4 class="text-lg">{{ $student->user->name }}</h4>
                <p class="text-sm">Klas: {{ $student->classroom->name ?? 'NVT' }}</p>
                <p class="text-sm">School: {{ $student->school->name ?? 'NVT' }}</p>
            </div>

            <div class="bg-inkt_vis text-witte_eend rounded-lg p-4 flex flex-col gap-2">
                <h4 class="font-bold text-md">Routes:</h4>
                <div class="flex justify-between text-sm">
                    <div class="flex flex-col items-center">
                        <p>Aantal:</p>
                        <p class="font-semibold">{{ $student->activeRoutes->count() }}</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <p>Kilometers:</p>
                        <p class="font-semibold">{{ $student->activeRoutes->sum(fn($ar) => $ar->route->distance ?? 0) }}</p>
                    </div>
                    <div class="flex flex-col items-center">

                        <p>Tijd:</p>
                        <p class="font-semibold">{{ round($student->activeRoutes->sum(fn($ar) => $ar->route->duration ?? 0)/60, 1) }} Uur</p>
                    </div>
                </div>
            </div>

            {{-- Alle routes --}}
            <div class="bg-sinas_sap text-witte_eend rounded-lg p-4 flex flex-col gap-2">
                <h4 class="font-bold text-md">Route geschiedenis:</h4>
                @if($student->activeRoutes->count() > 0)
                    <ul class="list-disc list-inside text-sm">
                        @foreach($student->activeRoutes as $active_route)
                            <li>{{ $active_route->route->name ?? 'Geen naam' }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Geen routes beschikbaar</p>
                @endif

            </div>

        </div>
    </div>
</div>
@endsection

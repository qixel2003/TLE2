@php
    $roleName = $activeRoute->role ?? null;
@endphp

@extends('layouts.natuurMonumenten')
@section('content')
    <h1 class="text-3xl font-bold mb-6">Checkpoints</h1>

    @if ($checkpoints->isEmpty())
        <p class="text-gray-600">Geen checkpoints gevonden.</p>
    @else
        <ul class="space-y-4">
            @foreach ($checkpoints as $checkpoint)
                <li class="p-4 bg-white rounded-lg shadow border border-gray-200">

                    <div class="flex items-center justify-between mb-1">
                        <strong class="text-lg">
                            Checkpoint
                        </strong>

                        <span class="inline-block px-2 py-1 text-sm bg-blue-100 text-blue-700 rounded">
                        {{ $checkpoint->points }} points
                    </span>
                    </div>

                    <div class="mt-2">
                        <span class="font-semibold text-gray-700">Missie:</span>

                        @if($checkpoint->mission_id)
                            <span class="text-gray-800">
        {{ $checkpoint->mission->title ?? 'Geen titel' }}
    </span>
                        @else
                            <em class="text-gray-500">Geen missie gelinkt.</em>
                        @endif
                    </div>

                    <a
                        href="/checkpoints/{{ $checkpoint->id }}"
                        class="inline-block mt-3 text-blue-600 hover:text-blue-800 font-medium"
                    >
                        Bekijk Missie →
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

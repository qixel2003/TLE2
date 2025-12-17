@php
    $roleName = $activeRoute->role ?? null;
@endphp

@extends('layouts.natuurMonumenten')

@section('content')
    <section aria-labelledby="checkpoints-titel">

        <h1 id="checkpoints-titel" class="text-3xl font-bold mb-6">
            Checkpoints
        </h1>

        @if ($checkpoints->isEmpty())
            <p class="text-gray-700">
                Geen checkpoints gevonden.
            </p>
        @else
            <ul class="space-y-4" role="list">

                @foreach ($checkpoints as $checkpoint)
                    <li
                        class="p-4 bg-white rounded-lg shadow border border-gray-200"
                        aria-labelledby="checkpoint-{{ $checkpoint->id }}-titel"
                    >

                        <div class="flex items-center justify-between mb-1">
                            <h2
                                id="checkpoint-{{ $checkpoint->id }}-titel"
                                class="text-lg font-semibold"
                            >
                                Checkpoint
                            </h2>

                            <span
                                class="inline-block px-2 py-1 text-sm bg-blue-100 text-blue-800 rounded"
                                aria-label="{{ $checkpoint->points }} punten"
                            >
                                {{ $checkpoint->points }} punten
                            </span>
                        </div>

                        <div class="mt-2">
                            <span class="font-semibold text-gray-800">
                                Missie:
                            </span>

                            @if($checkpoint->mission_id)
                                <span class="text-gray-900">
                                    {{ $checkpoint->mission->title ?? 'Geen titel' }}
                                </span>
                            @else
                                <em class="text-gray-700">
                                    Geen missie gelinkt.
                                </em>
                            @endif
                        </div>

                        <a
                            href="{{ url('/checkpoints/' . $checkpoint->id) }}"
                            class="inline-block mt-3 font-medium underline text-blue-700 hover:text-blue-900
                                   focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
                        >
                            Bekijk missie
                        </a>
                    </li>
                @endforeach

            </ul>
        @endif
    </section>
@endsection

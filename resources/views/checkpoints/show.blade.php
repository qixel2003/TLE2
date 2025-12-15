@php
    $roleName = $activeRoute->getRoleName();
@endphp

@vite('resources/css/app.css')
@extends('layouts.natuurMonumenten')
@section('content')
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">
            Checkpoint
        </h1>

        <div class="p-6 bg-white rounded-lg shadow border border-gray-200 mb-6">
            <p class="text-lg mb-4">
                <strong class="font-semibold">Punten:</strong>
                <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded">
                {{ $checkpoint->points }}
            </span>
            </p>

            <div class="mb-4">
                <span class="font-semibold text-gray-700">Missie:</span>
                @if($checkpoint->mission)
                    <span class="text-gray-800">{{ $checkpoint->mission->title }}</span>
                @else
                    <em class="text-gray-500">Geen missie gelinkt.</em>
                @endif
            </div>

            @if ($checkpoint->mission && $checkpoint->mission->questions->count() > 0)
                @if($activeRoute->role === 2)
                    @foreach($checkpoint->mission->questions as $q)
                        <div class="mb-6 p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <h2 class="text-2xl font-semibold mb-3">
                                Vraag: {{ $q->question }}
                            </h2>

                            <ul class="space-y-2">
                                @for ($i = 1; $i <= 4; $i++)
                                    @php
                                        $answerKey = 'answer_' . $i;
                                        $correctKey = 'correct_answer_' . $i;
                                    @endphp

                                    <li class="p-3 border rounded bg-white">
                                        <button
                                            type="button"
                                            class="w-full text-left flex items-center justify-between px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            data-answer-index="{{ $i }}"
                                        >
                                            <span>{{ $q->{$answerKey} }}</span>
                                            
                                        </button>
                                    </li>
                                @endfor
                            </ul>
                            <form method="POST" action="{{ route('active-routes.complete', $activeRoute) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="w-full px-3 py-2 bg-witte_eend hover:bg-gray-200 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                >
                                    Antwoord indienen
                                </button>
                            </form>
                        </div>
                    @endforeach
                @endif
                @if($activeRoute->role === 4)
                    <div class="mt-4 p-4 bg-white border rounded">
                        <h3 class="text-lg font-semibold mb-2">Verkenningsopdracht:</h3>

                        <p class="text-gray-700 mb-4">
                            Hoeveel bloemen van dezelfde soort zie je op deze plek?
                        </p>

                        <form method="POST" action="{{ route('active-routes.complete', $activeRoute) }}">
                            @csrf
                            @method('PATCH')

                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Aantal bloemen
                            </label>

                            <input
                                type="number"
                                name="flower_count"
                                min="0"
                                placeholder="Bijvoorbeeld: 7"
                                class="w-full border rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            />

                            <button
                                type="submit"
                                class="w-full px-3 py-2 bg-witte_eend hover:bg-gray-200 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                            >
                                Antwoord indienen
                            </button>
                        </form>
                    </div>
                @endif

                @if($activeRoute->role === 3 && $checkpoint->mission->prompts)
                    <div class="mt-4 p-4 bg-white border rounded">
                        <h3 class="text-lg font-semibold mb-2">Tekenopdracht:</h3>
                        <p class="text-gray-700">
                            {{ $checkpoint->mission->prompts->drawing ?? 'Geen tekenopdracht.' }}
                        </p>
                        <form method="POST" action="{{ route('active-routes.complete', $activeRoute) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <label class="block text-sm font-medium text-gray-700 mt-3">Upload bestand
                                (tekening/pdf)</label>
                            <input
                                type="file"
                                name="drawing_file"
                                accept="image/*,application/pdf"
                                class="mt-1 block w-full text-sm text-gray-700 bg-white border rounded px-3 py-2"
                            />

                            <button
                                type="submit"
                                class="w-full px-3 py-2 bg-witte_eend hover:bg-gray-200 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                            >
                                Antwoord indienen
                            </button>
                        </form>
                    </div>
                @endif

                @if($activeRoute->role === 1 && $checkpoint->mission->prompts)
                    <div class="mt-4 p-4 bg-white border rounded">
                        <h3 class="text-lg font-semibold mb-2">Fotografieopdracht:</h3>
                        <p class="text-gray-700">
                            {{ $checkpoint->mission->prompts->photography ?? 'Geen fotografieopdracht.' }}
                        </p>
                        <form method="POST" action="{{ route('active-routes.complete', $activeRoute) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <label class="block text-sm font-medium text-gray-700 mt-3">Upload foto</label>
                            <input
                                type="file"
                                name="photography_file"
                                accept="image/*"
                                class="mt-1 block w-full text-sm text-gray-700 bg-white border rounded px-3 py-2"
                            />

                            <button
                                type="submit"
                                class="w-full px-3 py-2 bg-witte_eend hover:bg-gray-200 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                            >
                                Antwoord indienen
                            </button>
                        </form>
                    </div>
                @endif
            @else
                <p class="text-gray-500 italic">
                    Geen missie of vraag gelinkt.
                </p>
            @endif

            <a
                href="/checkpoints"
                class="inline-block mt-6 text-blue-600 hover:text-blue-800 font-medium"
            >
                ← Terug naar checkpoints
            </a>
        </div>
    </div>
@endsection

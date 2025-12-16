@php
    $roleName = $activeRoute->getRoleName();
@endphp

@extends('layouts.natuurMonumenten')

@section('content')
    <section aria-labelledby="missie-titel" class="max-w-3xl mx-auto">

        <h1 id="missie-titel" class="text-3xl font-bold mb-6">
            Missie
        </h1>

        <article class="p-6 bg-white rounded-lg shadow border border-gray-200 mb-6">

            {{-- Punten --}}
            <p class="text-lg mb-4">
                <span class="font-semibold">Punten:</span>
                <span
                    class="inline-block px-2 py-1 bg-blue-100 text-blue-800 rounded"
                    aria-label="{{ $checkpoint->points }} punten"
                >
                    {{ $checkpoint->points }}
                </span>
            </p>

            {{-- Missietitel --}}
            <div class="mb-6">
                <span class="font-semibold text-gray-800">Missie:</span>
                @if($checkpoint->mission)
                    <span class="text-gray-900">
                        {{ $checkpoint->mission->title }}
                    </span>
                @else
                    <em class="text-gray-700">
                        Geen missie gelinkt.
                    </em>
                @endif
            </div>

            {{-- HISTORICUS --}}
            @if ($checkpoint->mission && $checkpoint->mission->questions->count() > 0 && $activeRoute->role === 2)

                @foreach($checkpoint->mission->questions as $q)
                    <section class="mb-8 p-4 bg-gray-50 rounded-lg"
                             aria-labelledby="vraag-{{ $q->id }}">

                        <h2 id="vraag-{{ $q->id }}"
                            class="text-2xl font-semibold mb-4">
                            Vraag
                        </h2>

                        <p class="mb-4 text-gray-800">
                            {{ $q->question }}
                        </p>

                        <ul class="space-y-2" role="list">
                            @for ($i = 1; $i <= 4; $i++)
                                @php
                                    $answerKey = 'answer_' . $i;
                                @endphp

                                <li>
                                    <button
                                        type="button"
                                        class="w-full text-left flex items-center justify-between
                                               px-3 py-2 bg-white border rounded
                                               hover:bg-gray-100
                                               focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
                                        data-answer-index="{{ $i }}"
                                    >
                                        {{ $q->{$answerKey} }}
                                    </button>
                                </li>
                            @endfor
                        </ul>

                        <form method="POST"
                              action="{{ route('active-routes.complete', $activeRoute) }}"
                              class="mt-4">
                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                class="w-full px-3 py-2 bg-natuur_groen text-witte_eend
                                       font-semibold rounded
                                       hover:bg-lnatuur_groen
                                       focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
                            >
                                Antwoord indienen
                            </button>
                        </form>
                    </section>
                @endforeach
            @endif

            {{-- SCOUT --}}
            @if($activeRoute->role === 4)
                <section class="mt-6 p-4 bg-white rounded-lg"
                         aria-labelledby="verkenningsopdracht">

                    <h2 id="verkenningsopdracht"
                        class="text-xl font-semibold mb-2">
                        Verkenningsopdracht
                    </h2>

                    <p class="text-gray-800 mb-4">
                        Hoeveel bloemen van dezelfde soort zie je op deze plek?
                    </p>

                    <form method="POST" action="{{ route('active-routes.complete', $activeRoute) }}">
                        @csrf
                        @method('PATCH')

                        <label for="flower_count"
                               class="block text-sm font-medium text-gray-800 mb-1">
                            Aantal bloemen
                        </label>

                        <input
                            id="flower_count"
                            type="number"
                            name="flower_count"
                            min="0"
                            placeholder="Bijvoorbeeld: 7"
                            class="w-full border rounded px-3 py-2 mb-4
                                   focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
                        />

                        <button
                            type="submit"
                            class="w-full px-3 py-2 bg-natuur_groen text-witte_eend
                                   font-semibold rounded
                                   hover:bg-lnatuur_groen
                                   focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
                        >
                            Antwoord indienen
                        </button>
                    </form>
                </section>
            @endif

            {{-- TEKENAAR --}}
            @if($activeRoute->role === 3 && $checkpoint->mission->prompts)
                <section class="mt-6 p-4 bg-white rounded-lg"
                         aria-labelledby="tekenopdracht">

                    <h2 id="tekenopdracht"
                        class="text-xl font-semibold mb-2">
                        Tekenopdracht
                    </h2>

                    <p class="text-gray-800 mb-4">
                        {{ $checkpoint->mission->prompts->drawing ?? 'Geen tekenopdracht.' }}
                    </p>

                    <form method="POST"
                          action="{{ route('active-routes.complete', $activeRoute) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <label for="drawing_file"
                               class="block text-sm font-medium text-gray-800 mb-1">
                            Upload bestand (tekening of PDF)
                        </label>

                        <input
                            id="drawing_file"
                            type="file"
                            name="drawing_file"
                            accept="image/*,application/pdf"
                            class="block w-full text-sm text-gray-800
                                   bg-white border rounded px-3 py-2 mb-4"
                        />

                        <button
                            type="submit"
                            class="w-full px-3 py-2 bg-natuur_groen text-witte_eend
                                   font-semibold rounded
                                   hover:bg-lnatuur_groen
                                   focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
                        >
                            Antwoord indienen
                        </button>
                    </form>
                </section>
            @endif

            {{-- FOTOGRAAF --}}
            @if($activeRoute->role === 1 && $checkpoint->mission->prompts)
                <section class="mt-6 p-4 bg-white rounded-lg"
                         aria-labelledby="fotografieopdracht">

                    <h2 id="fotografieopdracht"
                        class="text-xl font-semibold mb-2">
                        Fotografieopdracht
                    </h2>

                    <p class="text-gray-800 mb-4">
                        {{ $checkpoint->mission->prompts->photography ?? 'Geen fotografieopdracht.' }}
                    </p>

                    <form method="POST"
                          action="{{ route('active-routes.complete', $activeRoute) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <label for="photography_file"
                               class="block text-sm font-medium text-gray-800 mb-1">
                            Upload foto
                        </label>

                        <input
                            id="photography_file"
                            type="file"
                            name="photography_file"
                            accept="image/*"
                            class="block w-full text-sm text-gray-800
                                   bg-white border rounded px-3 py-2 mb-4"
                        />

                        <button
                            type="submit"
                            class="w-full px-3 py-2 bg-natuur_groen text-witte_eend
                                   font-semibold rounded
                                   hover:bg-lnatuur_groen
                                   focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
                        >
                            Antwoord indienen
                        </button>
                    </form>
                </section>
            @endif

            {{-- Geen missie --}}
            @if(!$checkpoint->mission)
                <p class="text-gray-700 italic mt-6">
                    Geen missie of vraag gelinkt.
                </p>
            @endif

            {{-- Terug --}}
            <a
                href="/checkpoints"
                class="inline-block mt-8 underline text-blue-700 hover:text-blue-900
                       focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
                Terug naar checkpoints
            </a>

        </article>
    </section>
@endsection

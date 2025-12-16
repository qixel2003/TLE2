@extends('layouts.natuurMonumenten')

@vite(['resources/css/app.css', 'resources/js/tutorial.js'])

@section('content')
    <section class="tutorial-page max-w-4xl mx-auto"
             aria-labelledby="tutorial-titel">

        <h1 id="tutorial-titel"
            class="text-3xl font-bold mb-6 text-center">
            Tutorial
        </h1>

        {{-- Tutorial stappen --}}
        <section
            id="tutorial-container"
            class="flex flex-wrap justify-center gap-6"
            aria-label="Tutorial stappen"
        >

            <div
                class="tutorial-card"
                data-explanation="Welkom! Kies eerst de route die je met je klas gaat lopen om informatie te verzamelen."
                role="group"
                aria-label="Stap 1: Route kiezen"
            >
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZETPBwcVfMQdVmy3OqUN4FWTCfepeREI72w&s"
                    alt="Een overzicht van beschikbare routes"
                >
            </div>

            <div
                class="tutorial-card"
                data-explanation="Als je de route hebt gekozen, klik je op de grote knop om het avontuur te starten."
                role="group"
                aria-label="Stap 2: Route starten"
            >
                <img
                    src="https://via.placeholder.com/150/0000FF/808080?text=Start+Knop"
                    alt="De startknop van de route"
                >
            </div>

            <div
                class="tutorial-card"
                data-explanation="Iedereen heeft een taak nodig. Kies hier welke rol jij gaat vervullen tijdens de route."
                role="group"
                aria-label="Stap 3: Rol kiezen"
            >
                <img
                    src="https://via.placeholder.com/150/FF0000/FFFFFF?text=Rollen"
                    alt="Overzicht van beschikbare rollen"
                >
            </div>

            <div
                class="tutorial-card"
                data-explanation="Zoek naar de QR-code bij het natuurmonument en scan deze om te beginnen."
                role="group"
                aria-label="Stap 4: QR-code scannen"
            >
                <img
                    src="https://via.placeholder.com/150/FFFF00/000000?text=QR+Code"
                    alt="Een QR-code om de route te starten"
                >
            </div>

        </section>

        {{-- Navigatieknoppen --}}
        <div class="clickable mt-8 flex justify-center gap-4"
             role="navigation"
             aria-label="Tutorial navigatie">

            <button
                id="prev-step-btn"
                type="button"
                class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300
                       focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
            >
                Vorige stap
            </button>

            <button
                id="next-step-btn"
                type="button"
                class="px-4 py-2 rounded bg-natuur_groen text-witte_eend
                       hover:bg-lnatuur_groen
                       focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
            >
                Volgende stap
            </button>

            <button
                id="home-btn"
                type="button"
                class="px-4 py-2 rounded bg-inkt_vis text-witte_eend
                       focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
                style="display: none;"
            >
                Ga naar startpagina
            </button>
        </div>

        {{-- Mascotte / uitleg --}}
        <aside
            id="mascot-wrapper"
            class="mt-10 flex items-start gap-4"
            aria-live="polite"
            aria-label="Uitleg van de mascotte"
        >
            <div class="speech-bubble">
                <p id="mascot-text">
                    Gebruik de knoppen om door de tutorial te gaan.
                </p>
            </div>

            <img
                src="https://cdn-icons-png.flaticon.com/512/4712/4712109.png"
                class="mascot-img"
                alt="Een mascotte die uitleg geeft"
            >
        </aside>

    </section>
@endsection

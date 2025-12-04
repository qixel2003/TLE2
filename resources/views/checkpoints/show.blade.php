@vite('resources/css/app.css')
<h1 class="text-3xl font-bold mb-6">
    Checkpoint {{ $checkpoint->checkpoint }}
</h1>

<p class="text-lg mb-4">
    <strong class="font-semibold">Punten:</strong>
    <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded">
        {{ $checkpoint->points }}
    </span>
</p>

@if ($checkpoint->mission)

    <h2 class="text-2xl font-semibold mb-2">
        Missie: {{ $checkpoint->mission->title }}
    </h2>

    <p class="mb-4 text-gray-700">
        {{ $checkpoint->mission->description }}
    </p>

    @if($checkpoint->mission->question)
        <p class="mb-2">
            <strong class="font-semibold">Vraag:</strong>
            {{ $checkpoint->mission->question }}
        </p>
    @endif

    @if($checkpoint->mission->drawing_prompt)
        <p class="mb-2 inline-block px-3 py-1 bg-yellow-100 text-yellow-800 rounded">
            Tekenen!
        </p>
    @endif

    @if($checkpoint->mission->photography_prompt)
        <p class="mb-2 inline-block px-3 py-1 bg-green-100 text-green-800 rounded">
            Foto!
        </p>
    @endif

@else
    <p class="text-gray-500 italic">
        Geen missie gelinkt.
    </p>
@endif

<a
    href="/checkpoints"
    class="inline-block mt-6 text-blue-600 hover:text-blue-800 font-medium"
>
    ← Terug naar checkpoints
</a>

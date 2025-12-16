<x-app-layout>
    <div class="max-w-md mx-auto mt-8 space-y-6">

        {{-- Classroom header --}}
        <div class="bg-natuur_groen text-white rounded-2xl p-5 shadow">
            <h1 class="text-xl font-bold">{{ $classroom->name }}</h1>
            <p class="text-sm opacity-90">
                Leraar: {{ $classroom->teacher->firstname ?? 'Niet bekend' }}
            </p>
        </div>

        {{-- Stats --}}
        <div class="bg-kinder_blauw text-white rounded-xl p-4 space-y-1">
            <p class="text-sm">
                Aantal leerlingen:
                {{ $classroom->students->count() > 0
                    ? $classroom->students->count()
                    : 'Er zitten nog geen leerlingen in deze klas' }}
            </p>

            <p class="text-sm">
                Punten totaal:
                {{ $classroom->points > 0
                    ? $classroom->points
                    : 'Deze klas heeft nog geen punten verdiend' }}
            </p>
        </div>

        {{-- Acties --}}
        <div class="flex gap-3">
            <a href="/classrooms/{{ $classroom->id }}/edit"
               class="flex-1 bg-vitamine_D hover:bg-sinas_sap text-white text-center rounded-lg py-2 font-medium transition">
                Bewerken
            </a>

            <form method="POST" action="{{ route('classrooms.destroy', $classroom->id) }}" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="w-full bg-roze_bloem hover:bg-inkt_vis text-white rounded-lg py-2 transition">
                    Verwijder klas
                </button>
            </form>
        </div>

        {{-- Terug --}}
        <a href="{{ route('school.dashboard') }}"
           class="block text-center text-blauwe_vogel hover:underline text-sm">
            ← Terug
        </a>

        {{-- Leerling toevoegen --}}
        <div class="bg-witte_eend rounded-xl p-4 shadow space-y-3">
            <form method="POST" action="{{ route('classrooms.addStudent', $classroom->id) }}">
                @csrf

                <select name="student_id" required
                        class="w-full rounded-lg border-gray-300 text-gray-800">
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">
                            {{ $student->user->email }}
                        </option>
                    @endforeach
                </select>

                <button type="submit"
                        class="w-full mt-3 bg-natuur_groen hover:bg-vitamine_D text-white rounded-lg py-2 transition">
                    Voeg leerling toe
                </button>
            </form>
        </div>

        {{-- Leerlingen lijst --}}
        <div class="space-y-4">
            <h2 class="text-lg font-bold text-inkt_vis">
                Leerlingen in deze klas
            </h2>

            @foreach($classroom->students as $student)
                <div class="bg-witte_eend rounded-xl p-4 shadow flex justify-between items-center">
                    <div>
                        <h3 class="font-semibold text-inkt_vis">
                            {{ $student->user->firstname }} {{ $student->user->lastname }}
                        </h3>
                        <p class="text-sm text-gray-600">{{ $student->user->email }}</p>
                        <p class="text-sm text-gray-600">Punten: {{ $student->points }}</p>
                    </div>

                    <div class="flex flex-col gap-2 items-end">
                        <a href="{{ route('student.show', $student->id) }}"
                           class="bg-blauwe_vogel hover:bg-kinder_blauw text-white text-sm px-3 py-1 rounded-lg transition">
                            Bekijk info
                        </a>

                        @include('classrooms.destroy-student')
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>

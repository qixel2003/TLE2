<x-app-layout>
    <div class="max-w-2xl mx-auto bg-gray-900 text-gray-200 p-6 rounded-xl mt-10 shadow-md">
        <h1 class="text-3xl font-bold mb-4">{{ $classroom->name }}</h1>


        <p><strong>Leraar:</strong> {{ $classroom->teacher->firstname ?? 'Niet bekend' }}</p>
        <p class="text-sm text-gray-500">Aantal leerlingen: {{ $classroom->students->count() > 0 ? $classroom->students->count() : 'Er zitten nog geen leerlingen in deze klas' }}</p>
        <p class="text-sm text-gray-500">Punten totaal: {{ $classroom->points > 0 ? $classroom->points : 'Deze klas heeft nog geen punten verdiend' }}</p>
        <div class="flex flex-col sm:flex-row sm:space-x-3 space-y-2 sm:space-y-0">
            <a href="/classrooms/{{ $classroom->id }}/edit" class="flex-1 text-center bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg px-4 py-2 transition">Edit</a>

            <form method="POST" action="{{ route('classrooms.destroy', $classroom->id) }}" class="flex-1">
                @csrf
                @method('DELETE')
                <x-primary-button type="submit" >Delete</x-primary-button>
            </form>
        </div>

        <div class="mt-6">
            <a href="{{ route('school.dashboard') }}" class="text-blue-400 hover:underline">← Terug</a>
        </div>
    </div>


    <!-- Search x-->
    <!-- leerlingen toevoegen -->
    <form method="POST" action="{{ route('classrooms.addStudent', $classroom->id) }}">
        @csrf

        <select name="student_id" required>
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->user->email }}</option>
            @endforeach
        </select>

        <div>
            <x-primary-button class="ms-4">
                {{ __('Voeg leerling toe') }}
            </x-primary-button>
        </div>
    </form>

    <!-- loopen leerlingen -->
    <h2 class="text-xl text-white font-bold mb-2">Leerlingen in deze klas:</h2>

    @foreach($classroom->students as $student)
        <div class="rounded-lg p-4 text-white bg-gray-900 border border-gray-800 shadow-md hover:border-blue-600 mb-2">
            <h3 class="text-lg font-semibold">
                {{ $student->user->firstname }} {{ $student->user->lastname }}
            </h3>
            <p>{{ $student->user->email }}</p>
            <p>Punten: {{ $student->points }}</p>
            <p>Routes: {{ $student->active_route_id ?? 'Nog geen routes gestart' }}</p>
        </div>
    @endforeach


</x-app-layout>

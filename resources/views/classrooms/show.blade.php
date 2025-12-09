<x-app-layout>
    <div class="max-w-2xl mx-auto bg-gray-900 text-gray-200 p-6 rounded-xl mt-10 shadow-md">
        <h1 class="text-3xl font-bold mb-4">{{ $classroom->name }}</h1>


        <p><strong>Docent:</strong> {{ optional($classroom->users)->firstname ?? 'Unknown' }}</p>
        <p class="text-sm text-gray-500">Aantal leerlingen: {{ $classroom->users()->where('role', 2)->count() }}</p>
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

        <select name="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->email }}</option>
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

    @foreach($classroomUsers as $student)
        <div
            class="rounded-lg p-4 text-white bg-gray-900 border border-gray-800 rounded-xl overflow-hidden shadow-md hover:border-blue-600 p-5 flex flex-col justify-between mb-2">
            <h3 class="text-lg font-semibold">{{ $student->firstname }} {{ $student->lastname }}</h3>
            <p>{{ $student->email }}</p>
        </div>
    @endforeach

</x-app-layout>

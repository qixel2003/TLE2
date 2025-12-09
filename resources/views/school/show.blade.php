<x-app-layout>
    <div class="max-w-2xl mx-auto bg-gray-900 text-gray-200 p-6 rounded-xl mt-10 shadow-md">
        <h1 class="text-3xl font-bold mb-4">{{ $school->name }}</h1>

        <p><strong>Docent:</strong> {{ optional($school->user->firstWhere('role', 1))->firstname ?? 'Unknown' }}</p>
        <p class="text-sm text-gray-500">Aantal leerlingen: {{ $school->user()->where('role', 2)->count() }}</p>

        <div class="flex flex-col sm:flex-row sm:space-x-3 space-y-2 sm:space-y-0">
            <a href="/rocks/{{ $school->id }}/edit" class="flex-1 text-center bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg px-4 py-2 transition">Edit</a>

            <form method="POST" action="{{ route('school.destroy', $school->id) }}" class="flex-1">
                @csrf
                @method('DELETE')
                <x-primary-button type="submit" >Delete</x-primary-button>
            </form>
        </div>

        <div class="mt-6">
            <a href="{{ route('school.dashboard') }}" class="text-blue-400 hover:underline">← Terug</a>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('classrooms.create') }}"/>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Maak een nieuwe klas aan
                    </button>
                </div>
            </div>
        </div>
        <div>
            @foreach($classrooms as $classroom)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-semibold">{{ $classroom->name }}</h3>
                                <p class="text-sm text-gray-500">Aantal
                                    leerlingen: {{ $classroom->users()->where('role', 2)->count() }}</p>
                            </div>
                            <div>
                                <a href="{{ route('classrooms.show', $classroom) }}"
                                   class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Bekijk
                                    Klas</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

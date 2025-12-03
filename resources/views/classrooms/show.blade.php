<x-app-layout>
    <div class="max-w-2xl mx-auto bg-gray-900 text-gray-200 p-6 rounded-xl mt-10 shadow-md">
        <h1 class="text-3xl font-bold mb-4">{{ $classroom->name }}</h1>
]
        <p><strong>Docent:</strong> {{ optional($classroom->users->firstWhere('role', 1))->firstname ?? 'Unknown' }}</p>
        <p class="text-sm text-gray-500">Aantal leerlingen: {{ $classroom->users()->where('role', 2)->count() }}</p>

        <div class="flex flex-col sm:flex-row sm:space-x-3 space-y-2 sm:space-y-0">
            <a href="/rocks/{{ $classroom->id }}/edit" class="flex-1 text-center bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg px-4 py-2 transition">Edit</a>

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




</x-app-layout>

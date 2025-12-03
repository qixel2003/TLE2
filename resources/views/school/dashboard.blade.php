<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('School dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Je bent ingelogd!") }}
                </div>
            </div>
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
                                <p class="text-sm text-gray-500">Aantal leerlingen: {{ $classroom->users()->where('role', 2)->count() }}</p>
                            </div>
                            <div>
                                <a href="{{ route('classrooms.show', $classroom) }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Bekijk Klas</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

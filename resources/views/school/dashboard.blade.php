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
    <div class="text-white">
    @foreach($schools as $school)
    <p><strong>School account beheerder:</strong> {{ optional($school->user->firstWhere('role', 1))->email ?? 'Niet bekend' }}</p>
    @endforeach
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('school.create') }}"/>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Meld jou school aan!
                    </button>
                </div>
            </div>
        </div>
    </div>

    @foreach($schools as $school)
        <a href="{{ route('school.show', $school) }}"
           class="">

            <div
                class="rounded-lg p-4 text-white bg-gray-900 border border-gray-800 rounded-xl overflow-hidden shadow-md hover:border-blue-600 p-5 flex flex-col justify-between mb-2">
                <!--toekomstige titel-->
                <h1 class="text-2xl font-bold mb-4">{{ $school['name'] }}</h1>
                <div class="shadow-xl p-4 rounded-lg border mb-3 space-y-1 border-gray-800">
                    <p class="text-sm text-gray-500">Aantal leerlingen: {{ $school->user()->where('role', 2)->count() }}</p>
                    <p class="text-sm text-gray-500">Aantal punten: {{ $school->points ?? 0 }}</p>
                    <p class="text-sm text-gray-500">Aantal gelopen routes: {{ $school->points ?? 0 }}</p>
                </div>

                <div class="p-1 mt-1">
                    <p><strong>Docent:</strong> {{ optional($school->user->firstWhere('role', 1))->firstname ?? 'Niet bekend' }}</p>
                </div>
            </div>
        </a>
    @endforeach




</x-app-layout>

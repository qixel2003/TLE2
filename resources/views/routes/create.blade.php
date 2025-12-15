<x-layout :heading="'Nieuwe Route Aanmaken'">
        <form action="{{ route('routes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 p-6 max-w-2xl mx-auto bg-white rounded-2xl shadow-xl">
            @csrf
            <div class="border-b pb-4 mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Nieuwe Route Aanmaken</h1>
                <p class="text-gray-600 mt-2">Voeg een nieuwe wandelroute toe aan Natuurmonumenten</p>
            </div>

            <div>
                <label for="name" class="block font-semibold text-black">Titel</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">
                @error('name')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="location" class="block font-semibold text-black">Locatie</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">
                @error('location')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="distance" class="block font-semibold text-black">Afstand (in km)</label>
                <input type="number" step="0.01" name="distance" id="distance" value="{{ old('distance') }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">
                @error('distance')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="duration" class="block font-semibold text-black">Tijd (in minuten)</label>
                <input type="number" name="duration" id="duration" value="{{ old('duration') }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">
                @error('duration')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="image" class="block font-semibold text-black">Foto</label>
                <input type="file" name="image" id="image" value="{{ old('image') }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">
                @error('image')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="description" class="block font-semibold text-black">Beschrijving</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">{{ old('description') }}</textarea>
                @error('description')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="difficulty" class="block font-semibold text-black">Moeilijkheid</label>
                <select name="difficulty" id="difficulty"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">
                    <option value="">Kies moeilijkheid</option>
                    <option value="makkelijk" {{ old('difficulty') == 'makkelijk' ? 'selected' : '' }}>Makkelijk</option>
                    <option value="gemiddeld" {{ old('difficulty') == 'gemiddeld' ? 'selected' : '' }}>Gemiddeld</option>
                    <option value="moeilijk" {{ old('difficulty') == 'moeilijk' ? 'selected' : '' }}>Moeilijk</option>
                </select>
                @error('difficulty')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="pt-6 border-t">
                <div class="flex space-x-4">
                    <button type="submit" class="bg-natuur_groen">Route Aanmaken</button>
                    <x-button href="{{ route('routes.index') }}" class="bg-natuur_groen">Terug</x-button>
                </div>
            </div>
        </form>
</x-layout>

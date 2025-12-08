<x-layout :heading="'Pas de route aan'">

    <form action="{{ route('routes.update', $route->id) }}" method="POST" class="space-y-4 p-6">
        @csrf
        @method('PUT')

        <div class="border-b pb-4 mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Route bijwerken</h1>
            <p class="text-gray-600 mt-2">Pas een route aan.</p>
        </div>

        <div>
            <label for="name" class="block font-semibold">Titel</label>
            <input type="text" name="name" id="name" value="{{ old('name', $route->name) }}" class="border border-gray-300 rounded p-2 w-full text-black">
            @error('name')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="location" class="block font-semibold">Locatie</label>
            <textarea name="location" id="location" class="border border-gray-300 rounded p-2 w-full text-black">{{ old('location', $route->location) }}</textarea>
            @error('location')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="distance" class="block font-semibold">Afstand</label>
            <input type="number" step="0,01" name="distance" id="distance" value="{{ old('distance', $route->distance) }}" class="border border-gray-300 rounded p-2 w-full text-black">
            @error('distance')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="duration" class="block font-semibold text-black">Tijd (in minuten)</label>
            <input type="number" name="duration" id="duration" value="{{ old('duration', $route->duration) }}" class="border border-gray-300 rounded p-2 w-full text-black">
            @error('duration')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description" class="block font-semibold text-black">Beschrijving</label>
            <textarea name="description" id="description" class="border border-gray-300 rounded p-2 w-full text-black">{{ old('description', $route->description) }}</textarea>
            @error('description')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="difficulty" class="block font-semibold text-black">Moeilijkheid</label>
            <select name="difficulty" id="difficulty" class="border border-gray-300 rounded p-2 w-full text-black">
                <option value="">Kies moeilijkheid</option>
                <option value="makkelijk" {{ (old('difficulty', $route->difficulty) == 'makkelijk') ? 'selected' : '' }}>makkelijk</option>
                <option value="gemiddeld" {{ (old('difficulty', $route->difficulty) == 'gemiddeld') ? 'selected' : '' }}>gemiddeld</option>
                <option value="moeilijk" {{ (old('difficulty', $route->difficulty) == 'moeilijk') ? 'selected' : '' }}>moeilijk</option>
            </select>
            @error('difficulty')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">Bijwerken</button>
            <a href="{{ route('routes.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded ml-2">Annuleren</a>
        </div>
    </form>
</x-layout>

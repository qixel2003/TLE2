@extends('layouts.natuurMonumenten')

@section('content')
    <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 p-6 max-w-2xl mx-auto bg-white rounded-2xl shadow-xl">
        @csrf
        <div class="border-b pb-4 mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Nieuwe Opdracht Aanmaken</h1>
            <p class="text-gray-600 mt-2">Voeg een bonusopdracht toe voor jouw klas.</p>
        </div>

        <div>
            <label for="title" class="block font-semibold text-black mb-2">Titel</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                   required>
            @error('title')
            <div class="text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="message" class="block font-semibold text-black mb-2">Beschrijving / Vraag</label>
            <textarea name="message" id="message" rows="4"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                      required>{{ old('message') }}</textarea>
            @error('message')
            <div class="text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="photo" class="block font-semibold text-black mb-2">Ondersteunende foto (optioneel)</label>
            <input type="file" name="photo" id="photo" accept="image/*"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">
            @error('photo')
            <div class="text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="pt-6 border-t">
            <div class="flex space-x-4">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200">Bonus opdracht Aanmaken</button>
                <a href="{{ route('messages.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-3 px-6 rounded-lg transition duration-200">Terug</a>
            </div>
        </div>
    </form>
@endsection

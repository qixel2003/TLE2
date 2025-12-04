<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maak een route aan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

{{--<x-layout>--}}
<div class="min-h-screen bg-gradient-to-br from-green-50 to-blue-100 py-12">
<form action="{{ route ('routes.store') }}" method="POST" class="space-y-4 p-6 max-w-2xl mx-auto bg-white rounded-2xl shadow-xl">
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @csrf

    <div class="border-b pb-4 mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Nieuwe Route Aanmaken</h1>
        <p class="text-gray-600 mt-2">Voeg een nieuwe wandelroute toe aan Natuurmonumenten</p>
    </div>

    <div>
        <label for="name" class="block font-semibold text-black">Title</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">
        @error('name')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="location" class="block font-semibold text-black">Locatie</label>
        <textarea name="location" id="location" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">{{ old('location') }}</textarea>
        @error('location')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="distance" class="block font-semibold text-black">Afstand</label>
        <input type="number" step="0.01" name="distance" id="distance" value="{{ old('distance') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">
        @error('distance')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="duration" class="block font-semibold text-black">Tijd (in minuten)</label>
        <input type="number" name="duration" id="duration" value="{{ old('duration') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">
        @error('duration')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

{{--    <div>--}}
{{--        <label for="image_url" class="">FotoL</label>--}}
{{--        <input type="url" name="image_url" id="image_url" value="{{ old('image_url') }}"--}}
{{--               class="bg-white text-black w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"--}}
{{--               placeholder="https://res.cloudinary.com/colbycloud-next-cloudinary/image/upload/c_fill,w_3840,h_2880,g_auto/f_auto/q_auto/v1/images/mountain?_a=BAVMn6DW0" alt="Route afbeelding van putten natuurmonument">--}}
{{--        <p class="">Plaats hier een adres van de foto.</p>--}}
{{--        @error('image_url')--}}
{{--        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>--}}
{{--        @enderror--}}
{{--    </div>--}}

    <div>
        <label for="description" class="block font-semibold text-black">Description</label>
        <textarea name="description" id="description" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">{{ old('description') }}</textarea>
        @error('description')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="difficulty" class="block font-semibold text-black">Moeilijkheid</label>
        <select name="difficulty" id="difficulty" class="border border-gray-300 rounded p-2 w-full text-black">
            <option value="">Kies moeilijkheid</option>
            <option value="makkelijk" {{ old('difficulty') == 'makkelijk' ? 'selected' : '' }}>makkelijk</option>
            <option value="gemiddeld" {{ old('difficulty') == 'gemiddeld' ? 'selected' : '' }}>gemiddeld</option>
            <option value="moeilijk" {{ old('difficulty') == 'moeilijk' ? 'selected' : '' }}>moeilijk</option>
        </select>
        @error('difficulty')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div class="pt-6 border-t">
        <div class="flex space-x-4">
            <button type="submit" class="flex-1 bg-green-600 hover:bg-green-700 text-black font-semibold py-3 px-6 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                Route Aanmaken
            </button>
            <a href="{{ route('routes.index') }}" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-lg transition duration-200 text-center">Terug</a>
        </div>
    </div>
</form>
</div>
{{--</x-layout>--}}

</body>
</html>


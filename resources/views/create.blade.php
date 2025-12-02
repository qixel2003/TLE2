{{--<x-layout>--}}
<form action="" method="post" class="space-y-4 p-6">
    @csrf
    <div>
        <label for="name" class="block font-semibold text-white">Title</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" class="">
        @error('name')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="location" class="block font-semibold text-white">Locatie</label>
        <textarea name="text" id="location" class="">{{ old('location') }}</textarea>
        @error('location')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="distance" class="block font-semibold text-white">Afstand</label>
        <textarea name="" id="distance" class="">{{ old('distance') }}</textarea>
        @error('distance')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="duration" class="block font-semibold text-white">Tijd</label>
        <textarea name="" id="duration" class="">{{ old('duration') }}</textarea>
        @error('duration')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="image_url" class="">Cover Image URL</label>
        <input type="url" name="image_url" id="image_url" value="{{ old('image_url') }}"
               class="bg-white text-black"
               placeholder="https://res.cloudinary.com/colbycloud-next-cloudinary/image/upload/c_fill,w_3840,h_2880,g_auto/f_auto/q_auto/v1/images/mountain?_a=BAVMn6DW0" alt="Route afbeelding van putten natuurmonument">
        <p class="">Plaats hier een adres van de foto.</p>
        @error('image_url')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="block font-semibold text-white">Description</label>
        <textarea name="description" id="description" class="">{{ old('description') }}</textarea>
        @error('description')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

    {{--        dit is van mijn programmeer 5 opdracht, moet nog veranderen. IS--}}
    <div>
        <label for="difficulty" class="block font-semibold text-white">Moeilijkheid</label>
        <select name="difficulty" id="difficulty" class="border border-gray-300 rounded p-2 w-full text-black">
            <option value="">Select difficulty</option>
            <option value="⭐" {{ old('difficulty') == '⭐' ? 'selected' : '' }}>⭐</option>
            <option value="⭐⭐" {{ old('difficulty') == '⭐⭐' ? 'selected' : '' }}>⭐⭐</option>
            <option value="⭐⭐⭐" {{ old('difficulty') == '⭐⭐⭐' ? 'selected' : '' }}>⭐⭐⭐</option>
            <option value="⭐⭐⭐⭐" {{ old('difficulty') == '⭐⭐⭐⭐' ? 'selected' : '' }}>⭐⭐⭐⭐</option>
            <option value="⭐⭐⭐⭐⭐" {{ old('difficulty') == '⭐⭐⭐⭐⭐' ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
        </select>
        @error('difficulty')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

            <button type="submit" class="bg-blue-500">Create Guide</button>
</form>
{{--</x-layout>--}}


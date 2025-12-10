<x-guest-layout>
    <form method="POST" action="{{ route('classrooms.store') }}">
        @csrf

        <select name="school_id" required>
            @foreach($schools as $school)
                <option value="{{ $school->id }}">{{ $school->name }}</option>
            @endforeach
        </select>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Naam')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-primary-button class="ms-4">
                {{ __('Voeg klas toe ') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

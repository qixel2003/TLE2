<x-layout>
    <x-slot:heading>
        <h1>Foto bewerken</h1>
    </x-slot:heading>


        <form action="{{ route('photos.update', $photo) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <img src="{{ asset('storage/' . $photo->image_path) }}">

            <label>Titel</label>
            <input type="text" name="title" value="{{ $photo->title }}">

            <label>Beschrijving</label>
            <textarea name="description">{{ $photo->description }}</textarea>

            <label>Nieuwe foto (optioneel)</label>
            <input type="file" name="photo">

            <button type="submit">Opslaan</button>
        </form>

        <form action="{{ route('photos.destroy', $photo) }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" onclick="return confirm('Verwijderen?')">Verwijder foto</button>
        </form>
</x-layout>

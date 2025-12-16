<x-layout>
    <x-slot:heading>
        <h1>Foto uploaden</h1>
    </x-slot:heading>

    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Foto</label>
        <input type="file" name="photo" required>

        <label>Titel</label>
        <input type="text" name="title" required>

        <label>Beschrijving</label>
        <textarea name="description"></textarea>

        <button type="submit">Upload</button>
    </form>

</x-layout>

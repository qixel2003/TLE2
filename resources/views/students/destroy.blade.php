<form action="{{ route('students.destroy', $student->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <x-custom-buttons.yellow-button>
        Verwijder leerling
    </x-custom-buttons.yellow-button>
</form>

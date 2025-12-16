<form action="{{ route('classrooms.students.destroy', [$classroom->id, $student->id]) }}" method="POST">
    @csrf
    @method('DELETE')

    <x-custom-buttons.yellow-button>
        Verwijder leerling uit klas
    </x-custom-buttons.yellow-button>
</form>

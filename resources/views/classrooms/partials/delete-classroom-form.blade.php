<form class="" action="{{ route('classrooms.destroy', $classrooms->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <x-custom-buttons.yellow-button>
        Verwijder klas
    </x-custom-buttons.yellow-button>
</form>

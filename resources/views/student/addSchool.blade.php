<div>
    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight m-4">
                {{ __('Meld je aan bij je school!') }}
            </h2>
            <select name="school_id" required>
                @foreach($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> <!-- voorbeeld -->

        <button type="submit" class="m-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Bevestig je school aanmelding!
        </button>
    </form>
</div>

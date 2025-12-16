<x-layout>
    <x-slot:heading>
        {{ $photo->title }}
    </x-slot:heading>

    <!-- Foto -->
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-4">
        <img src="{{ asset('storage/' . $photo->image_path) }}" class="w-full rounded-xl">

        <div class="mt-4 flex items-center gap-3">
            <img src="https://api.dicebear.com/9.x/adventurer/svg?seed={{ $photo->user->name }}"
                 class="w-12 h-12 rounded-full">

            <div>
                <p class="font-bold">{{ $photo->user->name }}</p>
                <p class="text-gray-600">{{ $photo->description }}</p>
            </div>
        </div>
    </div>

    <!-- Comments -->
    <div class="max-w-3xl mx-auto mt-6">
        <h2 class="text-xl font-semibold mb-2">Comments</h2>

        @foreach($photo->comments as $comment)
            <div class="bg-white rounded-xl shadow p-3 mb-3 flex items-start gap-3">
                <img src="https://api.dicebear.com/9.x/adventurer/svg?seed={{ $comment->user->name }}"
                     class="w-10 h-10 rounded-full">
                <div>
                    <p class="font-bold">{{ $comment->user->name }}</p>
                    <p>{{ $comment->comment }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Comment form -->
    @auth
        <div class="max-w-3xl mx-auto mt-6">
            <form action="{{ route('comments.store', $photo) }}" method="POST">
                @csrf

                <textarea name="comment" rows="3"
                          class="w-full border rounded-xl p-3"
                          placeholder="Laat een reactie achter..."></textarea>

                <button class="mt-2 px-4 py-2 bg-blauwe_vogel text-white rounded-full hover:bg-inkt_vis">
                    Plaatsen
                </button>
            </form>
        </div>
    @endauth

</x-layout>

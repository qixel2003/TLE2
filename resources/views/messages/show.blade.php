<!-- resources/views/messages/show.blade.php -->
<x-layout :heading="$message->title">
    <div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="mb-8">
                <a href="{{ route('messages.index') }}" class="text-green-600 hover:text-green-700 font-semibold mb-4 inline-block">← Terug naar overzicht</a>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                @if($message->photo)
                    <div class="h-64 md:h-80 overflow-hidden">
                        <img src="{{ asset('storage/' . $message->photo) }}" alt="{{ $message->title }}" class="w-full h-full object-cover">
                    </div>
                @endif

                <div class="p-6 md:p-8">
                    <div class="flex justify-between items-start mb-4">
                        <h1 class="text-3xl font-bold text-gray-800">{{ $message->title }}</h1>
                        @if(auth()->id() === $message->user_id)
                            <a href="{{ route('messages.edit', $message->id) }}" class="text-blue-600 hover:text-blue-700 font-semibold">Bewerk</a>
                        @endif
                    </div>

                    <div class="mb-6">
                        <p class="text-gray-700 whitespace-pre-line">{{ $message->message }}</p>
                    </div>

                    <div class="border-t pt-4">
                        <div class="flex justify-between items-center text-sm text-gray-600">
                            <div>
                                <p><span class="font-medium">Gemaakt door:</span> {{ $message->user->name ?? 'Onbekend' }}</p>
                                <p><span class="font-medium">Datum:</span> {{ $message->created_at->format('d M Y') }}</p>
                            </div>

                            @if(auth()->id() === $message->user_id)
                                <form action="{{ route('messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze opdracht wilt verwijderen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-700 font-semibold">Verwijder</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            @auth
                @if(auth()->user()->hasRole('student'))
                    <div class="mt-8 bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Lever je antwoord in</h2>
                        <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <input type="hidden" name="message_id" value="{{ $message->id }}">

                            <div>
                                <label for="title" class="block font-semibold text-black mb-2">Titel van je inzending</label>
                                <input type="text" name="title" id="title" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                @error('title')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="description" class="block font-semibold text-black mb-2">Beschrijving</label>
                                <textarea name="description" id="description" rows="3"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"></textarea>
                                @error('description')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="image_path" class="block font-semibold text-black mb-2">Foto van je antwoord *</label>
                                <input type="file" name="image_path" id="image_path" accept="image/*" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                @error('image_path')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200">Inleveren</button>
                        </form>
                    </div>
                @endif
            @endauth

            <div class="mt-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Ingediende antwoorden</h2>
                @if($studentPhotos && $studentPhotos->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($studentPhotos as $photo)
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                                @if($photo->image_path)
                                    <div class="h-48 overflow-hidden">
                                        <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}" class="w-full h-full object-cover">
                                    </div>
                                @endif
                                <div class="p-4">
                                    <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $photo->title }}</h3>
                                    @if($photo->description)
                                        <p class="text-gray-600 text-sm mb-3">{{ Str::limit($photo->description, 100) }}</p>
                                    @endif
                                    <div class="text-sm text-gray-500 border-t pt-3">
                                        <p><span class="font-medium">Leerling:</span> {{ $photo->user->name ?? 'Onbekend' }}</p>
                                        <p><span class="font-medium">Ingediend:</span> {{ $photo->created_at->format('d M Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-blue-800 px-4 py-3 rounded">
                        <p>Nog geen antwoorden ingediend.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>

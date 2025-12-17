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

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
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

                        @auth
                            @if(!auth()->user()->isStudent() && (auth()->id() === $message->user_id || auth()->user()->isAdmin()))
                                <a href="{{ route('messages.edit', $message->id) }}" class="text-blue-600 hover:text-blue-700 font-semibold">Bewerk</a>
                            @endif
                        @endauth
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

                            @auth
                                @if(!auth()->user()->isStudent() && (auth()->id() === $message->user_id || auth()->user()->isAdmin()))
                                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze opdracht wilt verwijderen?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700 font-semibold">Verwijder</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            @auth
                @if(auth()->user()->isStudent())
                    <div class="mt-6">
                        <a href="{{ route('bonuses.create', ['message_id' => $message->id]) }}"
                           class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition">
                            Bonus opdracht inleveren
                        </a>
                    </div>
                @endif
            @endauth

            <div class="mt-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Ingediende antwoorden</h2>
                @if($studentBonuses && $studentBonuses->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($studentBonuses as $bonus)
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                                @if($bonus->image_path)
                                    <div class="h-48 overflow-hidden">
                                        <img src="{{ asset('storage/' . $bonus->image_path) }}" alt="{{ $bonus->title }}" class="w-full h-full object-cover">
                                    </div>
                                @endif
                                <div class="p-4">
                                    <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $bonus->title }}</h3>
                                    @if($bonus->description)
                                        <p class="text-gray-600 text-sm mb-3">{{ Str::limit($bonus->description, 100) }}</p>
                                    @endif
                                    <div class="text-sm text-gray-500 border-t pt-3">
                                        <p><span class="font-medium">Leerling:</span> {{ $bonus->user->name ?? 'Onbekend' }}</p>
                                        <p><span class="font-medium">Ingediend:</span> {{ $bonus->created_at->format('d M Y H:i') }}</p>

                                        @if($bonus->status)
                                            <p class="mt-1">
                                                <span class="font-medium">Status:</span>
                                                <span class="px-2 py-1 text-xs rounded-full {{ $bonus->status === 'goedgekeurd' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $bonus->status }}
                                                </span>
                                            </p>
                                        @endif

                                        @auth
                                            @if(!auth()->user()->isStudent())
                                                <div class="mt-2">
                                                    <a href="{{ route('bonuses.show', $bonus->id) }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                                                        Bekijk details & beoordeel bekijken
                                                    </a>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-blue-50 text-blue-800 px-4 py-3 rounded">
                        <p>Nog geen antwoorden ingediend.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>

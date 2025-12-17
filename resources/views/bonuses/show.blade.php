<!-- resources/views/bonuses/show.blade.php -->
<x-layout :heading="'Bonus inzending: ' . $bonus->title">
    <div class="min-h-screen py-8 px-4">
        <div class="max-w-4xl mx-auto">
            <div class="mb-8">
                <a href="{{ url()->previous() }}" class="text-green-600 hover:text-green-700 font-semibold">← Terug</a>

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

            <div class="bg-white rounded-lg shadow p-6">
                <div class="mb-4">
                    @if($bonus->status)
                        <span class="px-3 py-1 rounded text-sm font-semibold {{ $bonus->status === 'goedgekeurd' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            Status: {{ $bonus->status }}
                        </span>
                    @else
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded text-sm font-semibold">
                            Status: In afwachting
                        </span>
                    @endif
                </div>

                <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $bonus->title }}</h1>

                @if($bonus->image_path)
                    <div class="mb-6">
                        <img src="{{ asset('storage/' . $bonus->image_path) }}" alt="{{ $bonus->title }}" class="max-w-full h-auto rounded">
                    </div>
                @endif

                <div class="mb-6">
                    <h2 class="font-semibold text-gray-700 mb-2">Beschrijving:</h2>
                    <p class="text-gray-700 whitespace-pre-line">{{ $bonus->description }}</p>
                </div>

                <div class="mb-6 border-t pt-4">
                    <h2 class="font-semibold text-gray-700 mb-2">Leerling informatie:</h2>
                    <p class="text-gray-600"><strong>Naam:</strong> {{ $bonus->user->name ?? 'Onbekend' }}</p>
                    <p class="text-gray-600"><strong>Email:</strong> {{ $bonus->user->email ?? 'Onbekend' }}</p>
                    <p class="text-gray-600"><strong>Ingediend op:</strong> {{ $bonus->created_at->format('d M Y H:i') }}</p>
                </div>

                @auth
                    @if(!auth()->user()->isStudent())
                        <div class="border-t pt-6">
                            <h2 class="font-semibold text-gray-700 mb-4">Beoordeling:</h2>

                            <div class="flex flex-wrap gap-3">
                                <form action="{{ route('bonuses.approve', $bonus) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded"
                                        {{ $bonus->status === 'goedgekeurd' ? 'disabled' : '' }}>
                                        {{ $bonus->status === 'goedgekeurd' ? 'Goedgekeurd' : 'Goedkeuren' }}
                                    </button>
                                </form>

                                <form action="{{ route('bonuses.reject', $bonus) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded"
                                        {{ $bonus->status === 'afgewezen' ? 'disabled' : '' }}>
                                        {{ $bonus->status === 'afgewezen' ? '✗ Afgekeurd' : 'Afkeuren' }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</x-layout>

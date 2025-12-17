<!-- resources/views/messages/index.blade.php -->
@extends('layouts.natuurMonumenten')

@section('content')
    <div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2">Bonus opdrachten</h1>
        </div>

        @if(session('success'))
            <div class="max-w-2xl mx-auto mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="max-w-2xl mx-auto mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        @endif

        <div class="max-w-7xl mx-auto">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($messages as $message)
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                        @if($message->photo)
                            <div class="h-48 overflow-hidden">
                                <img src="{{ asset('storage/' . $message->photo) }}" alt="{{ $message->title }}"
                                     class="w-full h-full object-cover">
                            </div>
                        @endif

                        <div class="p-6">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800 mb-1">{{ $message->title }}</h2>
                                    <p class="text-gray-600 text-sm">{{ Str::limit($message->message, 140) }}</p>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center justify-between">
                                <div class="text-sm text-gray-600">
                                    <p><span class="font-medium">Door:</span> {{ $message->user->name ?? 'Onbekend' }}
                                    </p>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('messages.show', $message->id) }}"
                                       class="text-green-600 hover:text-green-700 font-semibold">Bekijk</a>

                                    @auth
                                        @if(!auth()->user()->isStudent() && (auth()->id() === $message->user_id || auth()->user()->isAdmin()))
                                            <a href="{{ route('messages.edit', $message->id) }}"
                                               class="text-blue-600 hover:text-blue-700 font-semibold">Bewerk</a>
                                            <form action="{{ route('messages.destroy', $message->id) }}" method="POST"
                                                  class="inline"
                                                  onsubmit="return confirm('Weet je zeker dat je deze opdracht wilt verwijderen?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-700 font-semibold">Verwijder
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>

                            <div class="mt-4 text-xs text-gray-500">Aangemaakt
                                op {{ $message->created_at->format('d M Y') }}</div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16 bg-white rounded-xl shadow-sm">
                        <h3 class="text-2xl font-bold text-gray-700 mb-2">Geen bonus opdrachten gevonden</h3>
                        <p class="text-gray-600 mb-6">Maak een nieuwe bonus opdracht aan zodat leerlingen de opdrachten
                            kunnen maken.</p>
                        @auth
                            @if(!auth()->user()->isStudent())
                                <a href="{{ route('messages.create') }}"
                                   class="inline-block bg-natuur_groen hover:bg-green-700 text-witte_eend font-semibold py-3 px-6 rounded-lg">Maak
                                    een bonusopdracht aan</a>
                            @endif
                        @endauth
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

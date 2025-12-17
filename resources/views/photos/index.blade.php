@extends('layouts.natuurMonumenten')

@section('content')
    <x-slot:heading>
        <h1>Fotospace</h1>
    </x-slot:heading>

    <a href="{{ route('photos.create') }}"
       class="mb-4 inline-block px-6 py-2 bg-blauwe_vogel text-witte_eend rounded-full hover:bg-inkt_vis transition">
        Upload Nieuwe Foto
    </a>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($photos as $photo)
            <a href="{{ route('photos.show', $photo) }}"
               class="block rounded-2xl overflow-hidden shadow hover:shadow-lg transition bg-white">

                <img src="{{ asset('storage/' . $photo->image_path) }}"
                     class="w-full h-64 object-cover">

                <div class="p-4 flex items-center gap-3 bg-white">
                    <img src="https://api.dicebear.com/9.x/adventurer/svg?seed={{ $photo->user->firstname }}"
                         class="w-10 h-10 rounded-full">

                    <div>
                        <p class="font-semibold">{{ $photo->user->firstname }}</p>
                        <p class="text-gray-600 text-sm">{{ $photo->description }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection

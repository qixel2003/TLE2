@extends('layouts.natuurMonumenten')

@section('content')

    @php
        // Sort students
        $sorted = $students->sortByDesc('points')->values();

        $first  = $sorted->get(0);
        $second = $sorted->get(1);
        $third  = $sorted->get(2);
        $others = $sorted->slice(3);
    @endphp

    <div class="leaderboard-container">

        <div class="text-center mb-6">
            <h2 class="text-xl font-bold">Klas {{ str_replace('Klas ', '', $classroom->name ?? '1A') }} leaderboard</h2>
            <p class="text-gray-500 text-sm">Zie wie er op de top staat en daag jezelf uit!</p>
        </div>

        <div class="podium-wrapper">

            <div class="podium-card rank-2">
                @if($second)
                    <img
                        src="{{ $second->user->profile_picture ? asset('storage/'.$second->user->profile_picture) : 'https://ui-avatars.com/api/?name='.urlencode($second->user->firstname).'&background=random' }}"
                        class="podium-avatar">
                    <div class="podium-name">{{ $second->user->firstname }}</div>
                    <div class="points-badge">{{ $second->points }} P</div>
                @endif
            </div>

            <div class="podium-card rank-1">
                @if($first)
                    <img
                        src="{{ $first->user->profile_picture ? asset('storage/'.$first->user->profile_picture) : 'https://ui-avatars.com/api/?name='.urlencode($first->user->firstname).'&background=0087c5&color=fff' }}"
                        class="podium-avatar">
                    <div class="podium-name">{{ $first->user->firstname }}</div>
                    <div class="points-badge">{{ $first->points }} P</div>
                @endif
            </div>

            <div class="podium-card rank-3">
                @if($third)
                    <img
                        src="{{ $third->user->profile_picture ? asset('storage/'.$third->user->profile_picture) : 'https://ui-avatars.com/api/?name='.urlencode($third->user->firstname).'&background=random' }}"
                        class="podium-avatar">
                    <div class="podium-name">{{ $third->user->firstname }}</div>
                    <div class="points-badge">{{ $third->points }} P</div>
                @endif
            </div>
        </div>

        <div class="list-wrapper">
            @foreach($others as $index => $student)
                <div class="list-item">
                    <div class="rank-number">{{ $loop->iteration + 3 }}</div>
                    <img
                        src="{{ $student->user->profile_picture ? asset('storage/'.$student->user->profile_picture) : 'https://ui-avatars.com/api/?name='.urlencode($student->user->firstname).'&background=random' }}"
                        class="list-avatar">
                    <div class="list-name">{{ $student->user->firstname }}</div>
                    <div class="list-points">{{ $student->points }} P</div>
                </div>
            @endforeach
        </div>

        <div class="action-buttons">
            <a href="{{ route('classrooms.show', $classroom->id) }}"
               class="btn-custom btn-green">
                Ga terug naar klas
            </a>

        </div>

    </div>

@endsection

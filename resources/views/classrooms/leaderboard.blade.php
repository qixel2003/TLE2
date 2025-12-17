<h2 class="text-2xl font-bold mb-4">
    Leaderboard – {{ $classroom->name }}
</h2>

@foreach($students as $index => $student)
    <div class="bg-witte_eend rounded-xl p-4 shadow flex justify-between items-center mb-2">
        <div>
            <h3 class="font-semibold text-inkt_vis">
                #{{ $index + 1 }}
                {{ $student->user->firstname }} {{ $student->user->lastname }}
            </h3>
            <p class="text-sm text-gray-600">
                Punten: {{ $student->points }}
            </p>
        </div>
    </div>
@endforeach

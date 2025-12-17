<div class="container">
    <h1>Leaderboard</h1>

    <table>
        <thead>
        <tr>
            <th>Rank</th>
            <th>Name</th>
            <th>School</th>
            <th>Points</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
            <tr>
                {{-- $loop->iteration gives you the current index starting at 1 --}}
                <td>#{{ $loop->iteration }}</td>

                {{-- Access the User name via the relationship --}}
                <td>{{ $student->user->name ?? 'Unknown' }}</td>

                {{-- Optional: Show school if relationship exists --}}
                <td>{{ $student->school->name ?? 'N/A' }}</td>

                <td><strong>{{ $student->points }}</strong></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@php $rank = 0; $prevPoints = null; @endphp

@foreach ($students as $index => $student)
    @php
        if ($prevPoints !== $student->points) {
            $rank = $index + 1;
        }
        $prevPoints = $student->points;
    @endphp

    <tr>
        <td>#{{ $rank }}</td>
        <td>{{ $student->user->name }}</td>
        <td>{{ $student->points }}</td>
    </tr>
@endforeach

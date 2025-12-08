<ul>
    @forelse($routes as $route)
        <li>
            <strong>{{ $route->name }}</strong> - {{ $route->location }}
            <br>
            <small>
                Afstand: {{ $route->distance }}km |
                Tijd: {{ $route->duration }} |
                Moeilijkheidsgraad: {{ $route->difficulty }}
            </small>
            @if($route->description)
                <p>{{ $route->description }}</p>
            @endif

            <form method="POST" action="{{ route('routes.start', $route) }}" style="display: inline;">
                @csrf
                <button type="submit">Start Route</button>
            </form>
        </li>
    @empty
        <li>Geen routes gevonden</li>
    @endforelse
</ul>


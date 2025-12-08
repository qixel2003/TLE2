<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Test</title>
</head>
<body>
<h1>Welkom, {{ auth()->user()->name }}</h1>

<h2>Available Routes:</h2>
<ul>
    @forelse($routes as $route)
        <li>
            <strong>{{ $route->name }}</strong> - {{ $route->location }}
            <br>
            <small>
                Distance: {{ $route->distance }}km |
                Duration: {{ $route->duration }} |
                Difficulty: {{ $route->difficulty }}
            </small>
            @if($route->description)
                <p>{{ $route->description }}</p>
            @endif
        </li>
    @empty
        <li>No routes found</li>
    @endforelse
</ul>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Log uit</button>
</form>
</body>
</html>



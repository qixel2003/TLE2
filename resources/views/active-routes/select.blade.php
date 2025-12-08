<!DOCTYPE html>
<html>
<head>
    <title>Selecteer je rol</title>
</head>
<body>
<h1>Selecteer je rol voor {{ $activeRoute->route->name }}</h1>

<form method="POST" action="{{ route('active-routes.update-role', $activeRoute) }}">
    @csrf
    @method('PATCH')

    <div>
        <label>
            <input type="radio" name="role" value="0" required>
            Rol 1 - Historicus
        </label>
    </div>
    <div>
        <label>
            <input type="radio" name="role" value="1" required>
            Rol 2 - Tekenaar
        </label>
    </div>
    <div>
        <label>
            <input type="radio" name="role" value="2" required>
            Rol 3 - Fotograaf
        </label>
    </div>

    <button type="submit">Bevestig rol</button>
</form>
</body>
</html>

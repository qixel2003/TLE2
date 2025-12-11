<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Natuurmonumenten' }}</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-witte_eend font-Poppins min-h-screen flex flex-col">

<!-- Top Bar -->
<header class="bg-blauwe_vogel text-witte_eend text-center py-4 shadow-md">
    <h1 class="text-xl font-semibold">Natuurmonumenten</h1>
</header>

<!-- Page Content -->
<main class="flex-1 px-4 py-6 border-solid border-kinder_blauw border-8">
    @yield('content')
</main>

<nav
    class="fixed bottom-0 left-0 right-0 bg-natuur_groen text-witte_eend py-3 shadow-inner w-full border-t-8 border-kinder_blauw">
    <div class="flex justify-between items-center text-2xl max-w-3xl mx-auto w-full px-4">

        <a href="/home" class="flex-1 flex flex-col items-center">
            <span>hoofdpagina</span>
        </a>

        <a href="/routes" class="flex-1 flex flex-col items-center">
            <span>kaart</span>
        </a>

        <a href="/" class="flex-1 flex flex-col items-center">
            <span>statistieken</span>
        </a>

        <a href="/profile" class="flex-1 flex flex-col items-center">
            <span>profiel</span>
        </a>
    </div>
</nav>


</body>
</html>

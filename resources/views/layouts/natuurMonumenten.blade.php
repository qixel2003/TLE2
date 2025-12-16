<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Natuurmonumenten' }}</title>
    <link rel="stylesheet"
          href={{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css')}}>

    @vite('resources/css/app.css')
</head>

<body class="bg-witte_eend font-Poppins min-h-screen flex flex-col">

<!-- Top Bar -->
<header class="bg-inkt_vis text-witte_eend text-center py-4 shadow-md">
    <h1 class="text-xl font-semibold">WandelWild</h1>
</header>

<!-- Page Content -->
<main class="flex-1 px-4 py-6 border-solid border-kinder_blauw border-8">
    @yield('content')
</main>

<nav
    class="fixed bottom-0 left-0 right-0 bg-natuur_groen text-witte_eend py-3 shadow-inner w-full border-t-8 border-kinder_blauw">
    <div class="flex justify-between items-center text-2xl max-w-3xl mx-auto w-full px-4">

        <a href="/routes" class="flex-1 flex flex-col items-center">
            <i class="fas fa-home"></i>
        </a>

        <a href="/photos" class="flex-1 flex flex-col items-center">
            <i class="fas fa-camera"></i>
        </a>

        <a href="/tutorial" class="flex-1 flex flex-col items-center">
            <i class="fas fa-chart-bar"></i>
        </a>

        <a href="/profile" class="flex-1 flex flex-col items-center">
            <i class="fas fa-user-alt"></i>
        </a>
    </div>
</nav>


</body>
</html>

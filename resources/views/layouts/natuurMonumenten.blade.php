<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Natuurmonumenten' }}</title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    >

    @vite('resources/css/app.css')
</head>

<body class="bg-witte_eend font-Poppins min-h-screen flex flex-col">

<!-- Skip link -->
<a
    href="#main-content"
    class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 bg-witte_eend text-black px-4 py-2 rounded shadow"
>
    Ga naar inhoud
</a>

<!-- Top Bar -->
<header class="bg-inkt_vis text-witte_eend text-center py-4 shadow-md">
    <h1 class="text-xl font-semibold">
        WandelWild
    </h1>
</header>

<!-- Page Content -->
<main
    id="main-content"
    class="flex-1 px-4 py-6 border-solid border-kinder_blauw border-8"
>
    @yield('content')
</main>

<!-- Bottom Navigation -->
<nav
    aria-label="Hoofdnavigatie"
    class="fixed bottom-0 left-0 right-0 bg-natuur_groen text-witte_eend py-3 shadow-inner w-full border-t-8 border-kinder_blauw"
>
    <div class="flex justify-between items-center text-2xl max-w-3xl mx-auto w-full px-4">

        <a
            href="/routes"
            class="flex-1 flex flex-col items-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-witte_eend"
            aria-label="Home"
        >
            <i class="fas fa-home" aria-hidden="true"></i>
            <span class="sr-only">Home</span>
        </a>

        <a
            href="/photos"
            class="flex-1 flex flex-col items-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-witte_eend"
            aria-label="Foto's"
        >
            <i class="fas fa-camera" aria-hidden="true"></i>
            <span class="sr-only">Foto's</span>
        </a>

        <a
            href="/tutorial"
            class="flex-1 flex flex-col items-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-witte_eend"
            aria-label="Tutorial"
        >
            <i class="fas fa-chart-bar" aria-hidden="true"></i>
            <span class="sr-only">Tutorial</span>
        </a>

        <a
            href="/profile"
            class="flex-1 flex flex-col items-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-witte_eend"
            aria-label="Profiel"
        >
            <i class="fas fa-user-alt" aria-hidden="true"></i>
            <span class="sr-only">Profiel</span>
        </a>

    </div>
</nav>

</body>
</html>

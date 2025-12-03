<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tutorial</title>
    @vite(['resources/css/app.css', 'resources/css/tutorial.css'])
    @vite('resources/js/tutorial.js')
</head>
<body>
<div>
    <h2>Tutorial</h2>
    <div id="tutorial-container">
        <div class="tutorial-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZETPBwcVfMQdVmy3OqUN4FWTCfepeREI72w&s"
                 alt="Card 1 Image">
            <p>
                Kies de route die je met je klas ga lopen voor informatie en te starten.
            </p>
        </div>

        <div class="tutorial-card">
            <img src="https://i.imgur.com/example-img-2.png" alt="Card 2 Image">
            <p>
                Klik om te starten
            </p>
        </div>

        <div class="tutorial-card">
            <img src="https://i.imgur.com/example-img-3.png" alt="Card 3 Image">
            <p>
                Kies je rol voor de route
            </p>
        </div>

        <div class="tutorial-card">
            <img src="https://i.imgur.com/example-img-4.png" alt="Card 4 Image">
            <p>
                Scan de QR code van de natuurmonument om te beginnen
            </p>
        </div>

    </div>
    <div class="clickable">
        <button id="prev-step-btn">Vorige stap</button>
        <button id="next-step-btn">Volgende stap</button>
        <button id="home-btn" style="display: none;">Ga naar Startpagina</button>

    </div>

</div>


</body>
</html>

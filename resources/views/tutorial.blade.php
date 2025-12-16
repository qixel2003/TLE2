<title>Tutorial</title>
@vite(['resources/css/app.css', 'resources/css/tutorial.css'])
@vite('resources/js/tutorial.js')

<div class="tutorial-page">
    <h2>Tutorial</h2>

    <div id="tutorial-container">
        <div class="tutorial-card"
             data-explanation="Welkom! Kies eerst de route die je met je klas gaat lopen om informatie te verzamelen.">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZETPBwcVfMQdVmy3OqUN4FWTCfepeREI72w&s"
                 alt="Route kiezen">
        </div>

        <div class="tutorial-card"
             data-explanation="Als je de route hebt gekozen, klik je op de grote knop om het avontuur te starten.">
            <img src="https://via.placeholder.com/150/0000FF/808080?text=Start+Knop" alt="Starten">
        </div>

        <div class="tutorial-card"
             data-explanation="Iedereen heeft een taak nodig. Kies hier welke rol jij gaat vervullen tijdens de route.">
            <img src="https://via.placeholder.com/150/FF0000/FFFFFF?text=Rollen" alt="Rollen kiezen">
        </div>

        <div class="tutorial-card"
             data-explanation="Zoek naar de QR code bij het natuurmonument en scan deze om te beginnen!">
            <img src="https://via.placeholder.com/150/FFFF00/000000?text=QR+Code" alt="QR Scan">
        </div>
    </div>

    <div class="clickable">
        <button id="prev-step-btn">Vorige stap</button>
        <button id="next-step-btn">Volgende stap</button>
        <button id="home-btn" style="display: none;">Ga naar Startpagina</button>
    </div>

    <div id="mascot-wrapper">
        <div class="speech-bubble">
            <p id="mascot-text">...</p>
        </div>
        <img src="https://cdn-icons-png.flaticon.com/512/4712/4712109.png" class="mascot-img" alt="Mascot">
    </div>

</div>

{{--to change the image later--}}
{{--<img src=".../old-mascot.png" class="mascot-img" alt="Mascot">--}}
{{--<img src="{{ asset('images/my-new-mascot.png') }}" class="mascot-img" alt="Mascot">--}}

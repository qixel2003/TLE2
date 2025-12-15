<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natuurmonumenten - Bepaal je rol!</title>
    <link rel="stylesheet" href={{asset('css/role.css')}}>
    <link rel="stylesheet"
          href={{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css')}}>

    @vite('resources/css/role.css')
    @vite('resources/js/role.js')
</head>
<body>

<div class="container">
    <header class="header">
        Natuurmonumenten
    </header>

    <main class="role-selection-card">
        <h2>Kies je rol!</h2>
        <form method="POST" action="{{ route('active-routes.update-role', $activeRoute) }}">
            @csrf
            @method('PATCH')
            <div class="role-list">

                <div class="role-item" data-role="fotograaf">
                    <i class="fas fa-camera"></i>
                    <div>
                        <span class="role-title">Fotograaf</span>
                        <p class="role-description">Legt alles vast wat belangrijk kan zijn voor de quest: sporen,
                            plekken,
                            dieren en ontdekkingen.</p>
                    </div>
                </div>

                <div class="role-item" data-role="historicus">
                    <i class="fas fa-scroll"></i>
                    <div>
                        <span class="role-title">Historicus</span>
                        <p class="role-description">Zoekt betekenis achter wat jullie vinden: waar komt het vandaan, wat
                            vertelt het over de natuur of het dier?</p>
                    </div>
                </div>

                <div class="role-item" data-role="tekenaar">
                    <i class="fas fa-pencil-alt"></i>
                    <div>
                        <span class="role-title">Tekenaar</span>
                        <p class="role-description">Maakt snelle schetsen van vondsten, vormen, patronen of situaties
                            die
                            belangrijk zijn voor de zoektocht.</p>
                    </div>
                </div>

                <div class="role-item" data-role="scout">
                    <i class="fas fa-user-circle"></i>
                    <div>
                        <span class="role-title">Scout</span>
                        <p class="role-description">Houdt overzicht, let op details in de omgeving en helpt het team de
                            juiste richting te kiezen tijdens de quest.</p>
                    </div>
                </div>
            </div>

            <button type="submit" class="continue-button" id="continueBtn">Verder</button>
            <input type="hidden" name="role" id="selectedRole">

        </form>
    </main>

    <nav class="bottom-nav">
        <i class="fas fa-home"></i>
        <i class="fas fa-camera"></i>
        <i class="fas fa-chart-bar"></i>
        <i class="fas fa-user-alt"></i>
    </nav>
</div>


</body>
</html>

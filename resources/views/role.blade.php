@extends('layouts.natuurMonumenten')

@section('content')
    <div class="role-selection-card">

        <h1 class="text-2xl font-bold mb-6 text-center">
            Kies je rol
        </h1>

        <form method="POST" action="{{ route('active-routes.update-role', $activeRoute) }}">
            @csrf
            @method('PATCH')
            <div class="role-list">

            <ul
                class="role-list"
                role="group"
                aria-labelledby="rol-keuze-titel"
            >
                <li>
                    <div
                        class="role-item"
                        data-role="fotograaf"
                        role="button"
                        tabindex="0"
                        aria-pressed="false"
                    >
                        <i class="fas fa-camera" aria-hidden="true"></i>
                        <div>
                            <span class="role-title">Fotograaf</span>
                            <p class="role-description">
                                Legt alles vast wat belangrijk kan zijn voor de quest: sporen,
                                plekken, dieren en ontdekkingen.
                            </p>
                        </div>
                    </div>
                </li>

                <li>
                    <div
                        class="role-item"
                        data-role="historicus"
                        role="button"
                        tabindex="0"
                        aria-pressed="false"
                    >
                        <i class="fas fa-scroll" aria-hidden="true"></i>
                        <div>
                            <span class="role-title">Historicus</span>
                            <p class="role-description">
                                Zoekt betekenis achter wat jullie vinden: waar komt het vandaan,
                                wat vertelt het over de natuur of het dier?
                            </p>
                        </div>
                    </div>
                </li>

                <li>
                    <div
                        class="role-item"
                        data-role="tekenaar"
                        role="button"
                        tabindex="0"
                        aria-pressed="false"
                    >
                        <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                        <div>
                            <span class="role-title">Tekenaar</span>
                            <p class="role-description">
                                Maakt snelle schetsen van vondsten, vormen, patronen of situaties
                                die belangrijk zijn voor de zoektocht.
                            </p>
                        </div>
                    </div>
                </li>

                <li>
                    <div
                        class="role-item"
                        data-role="scout"
                        role="button"
                        tabindex="0"
                        aria-pressed="false"
                    >
                        <i class="fas fa-user-circle" aria-hidden="true"></i>
                        <div>
                            <span class="role-title">Scout</span>
                            <p class="role-description">
                                Houdt overzicht, let op details in de omgeving en helpt het team
                                de juiste richting te kiezen tijdens de quest.
                            </p>
                        </div>
                    </div>
                </li>
            </ul>

            <button
                type="submit"
                class="continue-button mt-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
                id="continueBtn"
            >
                Verder
            </button>

            <input type="hidden" name="role" id="selectedRole">
        </form>
    </div>
@endsection

@vite('resources/js/role.js')

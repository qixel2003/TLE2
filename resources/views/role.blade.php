@extends('layouts.natuurMonumenten')

@section('content')
        <div class="role-selection-card">
            <h2>Kies je rol!</h2>

            <form method="POST" action="{{ route('active-routes.update-role', $activeRoute) }}">
                @csrf
                @method('PATCH')

                <div class="role-list">

                    <div class="role-item" data-role="fotograaf" role="button" tabindex="0">
                        <i class="fas fa-camera"></i>
                        <div>
                            <span class="role-title">Fotograaf</span>
                            <p class="role-description">
                                Legt alles vast wat belangrijk kan zijn voor de quest: sporen,
                                plekken, dieren en ontdekkingen.
                            </p>
                        </div>
                    </div>


                    <div class="role-item" data-role="historicus" role="button" tabindex="1">
                        <i class="fas fa-scroll"></i>
                        <div>
                            <span class="role-title">Historicus</span>
                            <p class="role-description">
                                Zoekt betekenis achter wat jullie vinden: waar komt het vandaan,
                                wat vertelt het over de natuur of het dier?
                            </p>
                        </div>
                    </div>

                    <div class="role-item" data-role="tekenaar" role="button" tabindex="2">
                        <i class="fas fa-pencil-alt"></i>
                        <div>
                            <span class="role-title">Tekenaar</span>
                            <p class="role-description">
                                Maakt snelle schetsen van vondsten, vormen, patronen of situaties
                                die belangrijk zijn voor de zoektocht.
                            </p>
                        </div>
                    </div>

                    <div class="role-item" data-role="scout" role="button" tabindex="3">
                        <i class="fas fa-user-circle"></i>
                        <div>
                            <span class="role-title">Scout</span>
                            <p class="role-description">
                                Houdt overzicht, let op details in de omgeving en helpt het team
                                de juiste richting te kiezen tijdens de quest.
                            </p>
                        </div>
                    </div>
                </div>

                <button type="submit" class="continue-button" id="continueBtn">
                    Verder
                </button>

                <input type="hidden" name="role" id="selectedRole">
            </form>
        </div>
@endsection

@vite('resources/js/role.js')

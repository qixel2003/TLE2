
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-6">Gefeliciteerd!</h1>
                    <p class="text-lg mb-4">Je hebt je route afgerond!</p>

                    <div class="bg-gray-100 p-4 rounded-lg mt-6">
                        <h2 class="text-2xl font-semibold mb-4">Route Statistieken</h2>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="font-semibold">Route Naam:</p>
                                <p>{{ $activeRoute->route->name }}</p>
                            </div>

                            <div>
                                <p class="font-semibold">je Rol:</p>
                                <p>{{ $activeRoute->getRoleName() }}</p>
                            </div>

                            <div>
                                <p class="font-semibold">Locatie:</p>
                                <p>{{ $activeRoute->route->location }}</p>
                            </div>

                            <div>
                                <p class="font-semibold">Afstand:</p>
                                <p>{{ $activeRoute->route->distance }} km</p>
                            </div>

                            <div>
                                <p class="font-semibold">Duratie:</p>
                                <p>{{ $activeRoute->route->duration }} minuten</p>
                            </div>

                            <div>
                                <p class="font-semibold">Moeilijkheidsgraad:</p>
                                <p>{{ ucfirst($activeRoute->route->difficulty) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('route-test') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Terug naar Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

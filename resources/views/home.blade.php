{{--<x-layout>--}}
    <div class="">

        <div class="">
            <h1 class="">Ontdek wandelroutes bij jou in de buurt</h1>
            <div class=""></div>
        </div>

        <div class="">
            <form method="GET" class="">
                <div>
                    <label class="">Plaats</label>
                    <select name="location" class="">
                        <option value="">Alle plaatsen</option>
                        <option>Spijkenisse</option>
                        <option>Rotterdam</option>
                        <option>Putten</option>
                    </select>
                </div>

                <div>
                    <label class="">Afstand</label>
                    <select name="distance" class="">
                        <option value="">Alle afstanden</option>
                        <option>1km - 1,5km</option>
                        <option>2km - 5km</option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button class="">Filter</button>
                </div>
            </form>
        </div>

        <div class="">
{{--            @forelse ($routes as $route)--}}
                <div class="">
                    <div class="">
{{--                        <img src="{{ $route->image_url ?? '' }}" alt="{{ $route->name }}" class="">--}}
                    </div>

                    <h2 class="">informatie route</h2>
                    <p class="text-white/80 mb-1"><span>Locatie:</span> {{ $route->location ?? '-' }}</p>
                    <p class="text-white/80 mb-1"><span>Afstand:</span> {{ $route->distance ?? '-' }}</p>
                    <p class="text-white/80 mb-1"><span>Tijd:</span> {{ $route->duration ?? '-' }}</p>

                    <p class=""> beschrijving
{{--                        {{ Str::limit($route->description, 100) }}--}}
                    </p>

                    <div class="">
                        <a href="#" class="">Bekijk route</a>
                    </div>
                </div>

{{--            @empty--}}
                <div class="">
                    <h3 class="">Geen routes gevonden</h3>
                    <p class="">Zodra er routes beschikbaar zijn verschijnen ze hier!</p>
                </div>
{{--            @endforelse--}}

        </div>

{{--        @if($routes->hasPages())--}}
{{--            <div class="">--}}
{{--                {{ $routes->links() }}--}}
{{--            </div>--}}
{{--        @endif--}}

    </div>
{{--</x-layout>--}}

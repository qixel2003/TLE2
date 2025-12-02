{{--<x-layout>--}}
{{--    <x-slot:heading>--}}
{{--        Welkom op de route pagina--}}
{{--    </x-slot:heading>--}}

    <div>
        <h1>
            Vind hier alle beschikbare routes bij jou in de buurt!
            Of klik op de onderstaande knoppen om de fotospace te bekijken en de klassen leiderschap!
        </h1>

{{--        <div>--}}
{{--            <x-button href="/fotospace">Check de fotospace!</x-button>--}}
{{--            <x-button href="/leaderboard">Zie wie leid!</x-button>--}}
{{--        </div>--}}
    </div>

    <div>
        <h2>Routes</h2>

{{--        filters moeten nog gemaakt worden. IS--}}
        <div>
            <label>Plaats:</label>
            <select>
                <option>Spijkenisse</option>
                <option>Rotterdam</option>
                <option>Putten</option>
            </select>

            <label>Afstand:</label>
            <select>
                <option>1km - 1,5km</option>
                <option>2km - 5km</option>
            </select>
            <button>Filter</button>
        </div>

        <div style="display:flex; gap:20px; margin-top:20px;">

{{--            hiervoor is de create nodig om routes te plaatsen via de admin. IS--}}
            <div style="width:30%; border:1px solid #ccc; border-radius:8px; padding:10px;">
                <img src="https://res.cloudinary.com/colbycloud-next-cloudinary/image/upload/c_fill,w_3840,h_2880,g_auto/f_auto/q_auto/v1/images/mountain?_a=BAVMn6DW0" alt="route afbeelding" style="width:100%; border-radius:6px;">
                <h3>Rendieren spotten!</h3>
                <p>Ontdek deze plek en leer meer over de natuur en dieren.</p>
                <p>Afstand: 1,4 km</p>
                <p>Checkpoints: 7</p>
                <p>Tijd: 1:13</p>
            </div>

            <div style="width:30%; border:1px solid #ccc; border-radius:8px; padding:10px;">
                <img src="https://res.cloudinary.com/colbycloud-next-cloudinary/image/upload/c_fill,w_3840,h_2880,g_auto/f_auto/q_auto/v1/images/mountain?_a=BAVMn6DW0" alt="route afbeelding" style="width:100%; border-radius:6px;">
                <h3>Wandelroute door het bos</h3>
                <p>Loop door een prachtig en rustgevend bosgebied.</p>
                <p>Afstand: 2,1 km</p>
                <p>Checkpoints: 10</p>
                <p>Tijd: 0:55</p>
            </div>

            <div style="width:30%; border:1px solid #ccc; border-radius:8px; padding:10px;">
                <img src="https://res.cloudinary.com/colbycloud-next-cloudinary/image/upload/c_fill,w_3840,h_2880,g_auto/f_auto/q_auto/v1/images/mountain?_a=BAVMn6DW0" alt="route afbeelding" style="width:100%; border-radius:6px;">
                <h3>Zonsondergang pad</h3>
                <p>Geniet van een magische zonsondergang tijdens deze route.</p>
                <p>Afstand: 3 km</p>
                <p>Checkpoints: 8</p>
                <p>Tijd: 1:30</p>
            </div>
        </div>
    </div>

{{--</x-layout>--}}


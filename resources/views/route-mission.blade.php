<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <p>Hier is dan waarschijnlijk je mission page, Dit is een dummy page.</p>
                <form action="{{ route('active-routes.complete', $activeRoute) }}" method="POST" class="mt-4">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Missie Voltooid</button>
                </form>
            </div>
        </div>
    </div>
</div>



<x-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <x-slot:heading>
                Profile Page
            </x-slot:heading>
        </h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-natuur_groen text-witte_eend shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <p>Name: Orpie</p>
                    <p>Klas: A1</p>
                    <p>Rol: Student</p>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-inkt_vis text-witte_eend shadow sm:rounded-lg">
                <div class="max-w-xl flex flex-col gap-5">
                    <h2>routes</h2>
                    <div class="flex flex-row gap-5">
                        <div>
                            <h3>Aantal:</h3>
                            <p>5</p>
                        </div>
                        <div>
                            <h3>Kilometers:</h3>
                            <p>9.3</p>
                        </div>
                        <div>
                            <h3>Tijd:</h3>
                            <p>4.1 uur</p>
                        </div>
                </div>
                    <x-custom-buttons.blue-button>Bekijk details</x-custom-buttons.blue-button>

                </div>
            </div>

            <div class="p-4 sm:p-8 bg-sinas_sap text-witte_eend shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <p>badges</p>
                    <x-custom-buttons.pink-button>Bekijk alle</x-custom-buttons.pink-button>
                    {{--                    @include('profile.partials.delete-user-form')--}}
                </div>
            </div>
        </div>
    </div>
</x-layout>

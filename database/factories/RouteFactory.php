<?php

namespace Database\Factories;

use App\Models\route;
use Illuminate\Database\Eloquent\Factories\Factory;

class RouteFactory extends Factory
{
    protected $model = route::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),

            // picture is nullable in your migration, so we skip it or fake it:
            'picture' => null,

            'location' => $this->faker->city(),

            'distance' => $this->faker->numberBetween(1, 20), // km

            'duration' => $this->faker->numberBetween(20, 200), // minutes

            'description' => $this->faker->paragraph(),

            'difficulty' => $this->faker->randomElement([
                'makkelijk',
                'gemiddeld',
                'moeilijk'
            ]),
        ];
    }
}

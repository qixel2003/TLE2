<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Route;

use App\Models\Mission;
use App\Models\Checkpoint;

class CheckpointDemoSeeder extends Seeder
{
    public function run()
    {
        $route = Route::create([
            'name' => 'Bos Wandelroute',
            'location' => 'Rotterdamse Bos',
            'distance' => 3, // km
            'duration' => 45, // minuten
            'description' => 'Een korte wandeling door het Rotterdamse Bos.',
            'difficulty' => 'Makkelijk',
        ]);
        
        $mission1 = Mission::create([
            'title' => 'Rood in de Natuur',
            'description' => 'Vind iets roods.',
            'question' => 'Vind iets roods in de natuur en maak er een foto van.',
            'answer' => 'Foto van iets roods in de natuur',
            'drawing_prompt' => 0,
            'photography_prompt' => 1,
        ]);

        Checkpoint::create([
            'route_id' => $route->id,
            'mission_id' => $mission1->id,
            'checkpoint' => 1,
            'points' => 10,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Prompt;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Route;
use App\Models\Mission;
use App\Models\Checkpoint;
use App\Models\Question;

class CheckpointDemoSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Demo',
            'lastname' => 'User',
            'email' => 'demo@email.com',
            'password' => bcrypt('password'),
            'role' => 1,
        ]);

        $route = Route::create([
            'name' => 'Bos Wandelroute',
            'location' => 'Rotterdamse Bos',
            'distance' => 3,
            'duration' => 45,
            'description' => 'Een korte wandeling door het Rotterdamse Bos.',
            'difficulty' => 'Makkelijk',
        ]);

        $mission = Mission::create([
            'title' => 'Bos Verkenningsmissie',
            'description' => 'Volg de route en ontdek wat er onderweg gebeurt.',
            'user_id' => $user->id,
        ]);

        Prompt::create([

            'mission_id' => $mission->id,
            'drawing' => 'Teken iets dat je ziet op de route.',
            'photography' => 'Maak een foto van iets interessants.',

        ]);


        Checkpoint::create([
            'route_id' => $route->id,
            'mission_id' => $mission->id,
            'checkpoint' => 1,
            'points' => 10,
        ]);

        Question::create([
            'mission_id' => $mission->id,
            'question' => 'Welke vogel hoor je het vaakst in dit bos?',
            'answer_1' => 'Merel',
            'answer_2' => 'Koolmees',
            'answer_3' => 'Roodborst',
            'answer_4' => 'Specht',

            // correct = 1, wrong = 0
            'correct_answer_1' => 0,
            'correct_answer_2' => 1,
            'correct_answer_3' => 0,
            'correct_answer_4' => 0,
        ]);

    }
}

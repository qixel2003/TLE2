<?php

namespace Database\Seeders;

use App\Models\Checkpoint;
use App\Models\Mission;
use App\Models\Prompt;
use App\Models\Question;
use App\Models\route;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $student = User::create([
            'name' => 'Student',
            'lastname' => 'Example',
            'email' => 'student@example.com',
            'password' => Hash::make('password'),
            'role' => 0, // Student role
            'email_verified_at' => now()
        ]);

        $route = route::create([
            'name' => 'Sample Route',
            'location' => 'Sample Location',
            'distance' => 5,
            'duration' => 50,
            'description' => 'This is a sample route for testing purposes.',
            'difficulty' => 'Easy',
        ]);

        Student::create([
            'user_id' => $student->id,
            'points' => 0,
        ]);

        $mission = Mission::create([
            'title' => 'Bos Verkenningsmissie',
            'description' => 'Volg de route en ontdek wat er onderweg gebeurt.',
            'user_id' => $student->id,
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

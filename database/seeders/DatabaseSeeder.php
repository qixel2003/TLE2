<?php

namespace Database\Seeders;

use App\Models\Checkpoint;
use App\Models\Classroom;
use App\Models\Mission;
use App\Models\Prompt;
use App\Models\Question;
use App\Models\Route;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'firstname' => 'Jane',
            'lastname' => 'Doe',
            'email' => 'janedoe@hr.nl',
            'password' => Hash::make('Rootrootroot'),
            'role' => 1,
        ]);

        $studentUser = User::factory()->create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'johndoe@hr.nl',
            'password' => Hash::make('Rootrootroot'),
            'role' => 2,
        ]);

        $school = School::factory()->create([
            'name' => 'HR School',
            'location' => 'Rotterdam',
            'user_id' => 1,
        ]);

        $classroom = Classroom::factory()->create([
            'user_id' => 1,
            'name' => 'Klas 1A',
            'points' => 0,
            'school_id' => 1
        ]);

        // Create the actual Student record
        $student = Student::create([
            'user_id' => $studentUser->id,
            'school_id' => $school->id,
            'classroom_id' => $classroom->id,
        ]);

        $route = route::create([
            'name' => 'Sample Route',
            'location' => 'Sample Location',
            'distance' => 5,
            'duration' => 50,
            'description' => 'This is a sample route for testing purposes.',
            'difficulty' => 'Easy',
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

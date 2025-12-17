<?php

namespace Database\Seeders;

use App\Models\Badge;
use App\Models\Checkpoint;
use App\Models\Classroom;
use App\Models\Mission;
use App\Models\Prompt;
use App\Models\Question;
use App\Models\Route;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


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

        $studentUserTwo = User::factory()->create([
            'firstname' => 'James',
            'lastname' => 'Doe',
            'email' => 'jamesndoe@hr.nl',
            'password' => Hash::make('Rootrootroot'),
            'role' => 2,
        ]);

        $studentUserThree = User::factory()->create([
            'firstname' => 'Jimmie',
            'lastname' => 'Doe',
            'email' => 'jimmiendoe@hr.nl',
            'password' => Hash::make('Rootrootroot'),
            'role' => 2,
        ]);

        $school = School::factory()->create([
            'name' => 'HR School',
            'city' => 'Rotterdam',
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

        $studentTwo = Student::create([
            'user_id' => $studentUserTwo->id,
            'school_id' => $school->id,
            'classroom_id' => $classroom->id,
        ]);

        $studentThree = Student::create([
            'user_id' => $studentUserThree->id,
            'school_id' => $school->id,
            'classroom_id' => $classroom->id,
        ]);

        $route = route::create([
            'name' => 'Groene wandelroute vanaf Rotterdam Centraal Station naar Buitenplaats De Tempel',
            'location' => 'Rotterdams platteland',
            'distance' => 15500,
            'duration' => 310,
            'description' => 'We starten onze wandeling in het centrum van Rotterdam: aan de voorkant van het centraal station.
                Rondom Rotterdam CS vind je verschillende leuke tentjes om even neer te strijken voor een hapje en een drankje.
                Halverwege de route kom je langs Buitenplaats De Tempel. Op de zondag (april - oktober) kun je tussen 12.00 - 16.00 uur terecht voor een hapje en drankje bij de foodtruck in de theetuin.',
            'difficulty' => 'gemiddeld',
            'image' => $this->seedRouteImage('route-rotterdam.png')
        ]);

        $mission = Mission::create([
            'title' => 'Polders Verkenningsmissie',
            'description' => 'Volg de route en ontdek wat er onderweg gebeurt.',
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
            'question' => 'Welke vogel hoor je het vaakst op de route?',
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

        $badges = [
            [
                'name' => 'Groene Verkenner',
                'slug' => 'groene-verkenner',
                'description' => 'Voltooi 1 route.',
                'icon' => 'badges/badge.png',
                'requirement_type' => 'RouteCompleted',
                'requirement_value' => 1,
            ],
            [
                'name' => 'Super Verkenner',
                'slug' => 'super-verkenner',
                'description' => 'Voltooi 5 routes.',
                'requirement_type' => 'RouteCompleted',
                'requirement_value' => 5,
            ],
            [
                'name' => 'Vogelspeurder',
                'slug' => 'vogelspeurder',
                'description' => 'Spot 1 vogel.',
                'requirement_type' => 'AnimalSpotted',
                'requirement_value' => 1,
            ],
            [
                'name' => 'Master Fotograaf',
                'slug' => 'master-fotograaf',
                'description' => 'Upload 10 foto’s.',
                'requirement_type' => 'PhotoPosted',
                'requirement_value' => 10,
            ],
        ];

        foreach ($badges as $badge) {
            Badge::create($badge);
        }

    }

    private function seedRouteImage(string $filename): string
    {
        $sourcePath = database_path("seeders/images/{$filename}");

        if (!File::exists($sourcePath)) {
            return '/storage/routes/placeholder.jpg';
        }

        $destinationPath = "routes/{$filename}";
        Storage::disk('public')->put($destinationPath, File::get($sourcePath));

        return Storage::url($destinationPath);
    }
}

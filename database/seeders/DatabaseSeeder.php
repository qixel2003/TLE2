<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\School;
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
        // User::factory(10)->create();

        User::factory()->create([
            'firstname' => 'Jane',
            'lastname' => 'Doe',
            'email' => 'janedoe@hr.nl',
            'password' => Hash::make('Rootrootroot'),
            'role' => 1,
        ]);

        User::factory()->create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'johndoe@hr.nl',
            'password' => Hash::make('Rootrootroot'),
            'role' => 2,
            'classroom_id' => null,
        ]);

        Classroom::factory()->create([
            'user_id' => 1,
            'name' => 'Klas 1A',
            'points' => 0,
            'school_id' => 1
        ]);

        School::factory()->create([
            'name' => 'HR School',
            'user_id' => 1,
        ]);
    }
}

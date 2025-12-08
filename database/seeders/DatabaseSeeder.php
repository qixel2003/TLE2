<?php

namespace Database\Seeders;

use App\Models\Route;
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
            'role' => 0 // Student role
        ]);

        $route = Route::create([
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
    }
}

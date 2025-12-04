<?php

namespace Database\Seeders;

use App\Models\Classroom;
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
        $student = User::factory()->create([
            'name' => 'Mark',
            'lastname' => 'Marcus',
            'email' => 'mark@example.com',
            'password' => Hash::make('password'),
            'role' => 0,
        ]);

        $teacher = User::factory()->create([
            'name' => 'Bobby',
            'lastname' => 'Boberson',
            'email' => 'bobby@example.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);

        $admin = User::factory()->create([
            'name' => 'Mary',
            'lastname' => 'Marilyn',
            'email' => 'mary@example.com',
            'password' => Hash::make('password'),
            'role' => 2,
        ]);

        $classroom = Classroom::create([
            'user_id' => $teacher->id,
            'name' => 'Class A',
            'points' => 0,
        ]);

        Student::create([
            'user_id' => $student->id,
            'classroom_id' => $classroom->id,
            'points' => 0,
        ]);
    }
}

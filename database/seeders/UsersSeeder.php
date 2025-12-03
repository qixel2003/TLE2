<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsersSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student = User::factory()->create([
            'firstname' => 'Mark',
            'lastname' => 'Marcus',
            'email' => 'mark@example.com',
            'password' => Hash::make('password'),
            'role' => 0,
        ]);
        Student::create(['user_id' => $student->id, 'active_route_id' => 0, 'points' => 0]);

        $teacher = User::factory()->create([
            'firstname' => 'Bobby',
            'lastname' => 'Boberson',
            'email' => 'bobby@example.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);

        $admin = User::factory()->create([
            'firstname' => 'Mary',
            'lastname' => 'Marilyn',
            'email' => 'mary@example.com',
            'password' => Hash::make('password'),
            'role' => 2,
        ]);
    }
}

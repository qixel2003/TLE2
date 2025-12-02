<?php

namespace Database\Seeders;

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
        User::factory()->create([
            'firstname' => 'Mark',
            'lastname' => 'Marcus',
            'email' => 'mark@example.com',
            'password' => Hash::make('password'),
            'role' => 0,
            // Missing model.
        ]);

        User::factory()->create([
            'firstname' => 'Bobby',
            'lastname' => 'Boberson',
            'email' => 'bobby@example.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);

        User::factory()->create([
            'firstname' => 'Mary',
            'lastname' => 'Marilyn',
            'email' => 'mary@example.com',
            'password' => Hash::make('password'),
            'role' => 2,
        ]);
    }
}

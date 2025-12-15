<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Badge;

class BadgeSeeder extends Seeder
{
    public function run()
    {
        $badges = [
            [
                'name' => 'Groene Verkenner',
                'slug' => 'groene-verkenner',
                'description' => 'Voltooi 1 route.',
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
}


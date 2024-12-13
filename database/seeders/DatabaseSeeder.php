<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Developer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         Developer::factory()->create([
             'difficulty' => 1,
         ]);

        Developer::factory()->create([
            'difficulty' => 2,
        ]);

        Developer::factory()->create([
            'difficulty' => 3,
        ]);

        Developer::factory()->create([
            'difficulty' => 4,
        ]);

        Developer::factory()->create([
            'difficulty' => 5,
        ]);
    }
}

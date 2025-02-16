<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'adiyatan',
            'email' => 'adiyazam03@gmail.com',
            'password' => bcrypt('asdf1234'),
        ]);

        $this->call(SpeakerSeeder::class);
        $this->call(ModuleSeeder::class);
    }
}

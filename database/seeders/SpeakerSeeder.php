<?php

namespace Database\Seeders;

use App\Models\Speaker;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SpeakerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Speaker::create([
                'name' => $faker->name,
                'contact' => $faker->unique()->safeEmail,
                'bio' => $faker->sentence(10),
            ]);
        }
    }
}

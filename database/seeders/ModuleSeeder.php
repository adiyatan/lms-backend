<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
        $modules = [];

        for ($i = 1; $i <= 10; $i++) {
            $modules[] = [
                'speaker_id'   => rand(1, 10), // Menggunakan speaker_id antara 1-10
                'name'         => 'Module ' . $i,
                'description'  => 'Deskripsi untuk Module ' . $i,
                'group_link'   => 'https://chat.whatsapp.com/example' . $i,
                'schedule'     => now()->addDays($i), // Jadwal dari hari ini + i hari
                'created_at'   => now(),
                'updated_at'   => now(),
            ];
        }

        DB::table('modules')->insert($modules);
    }
}

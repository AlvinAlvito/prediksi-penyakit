<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil semua seeder yang dibutuhkan
        $this->call([
            AdminSeeder::class,
            BobotGejalaSeeder::class, // tambahkan ini
        ]);
    }
}

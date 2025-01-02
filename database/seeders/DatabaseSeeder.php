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
        $this->call([
            RoleSeeder::class,
            PenggunaSeeder::class,
            ProfileSeeder::class,
            GenreSeeder::class,
            MovieSeeder::class,
            CastSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
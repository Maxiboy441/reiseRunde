<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\TripFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TripSeeder::class,
            CountrySeeder::class,
            TripHasCountriesSeeder::class,
            UserHasFriendsSeeder::class,
            UserHasTripSeeder::class
        ]);
    }
}

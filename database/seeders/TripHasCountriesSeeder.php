<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trip;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class TripHasCountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trips = Trip::all();
        $countries = Country::all();

        foreach ($trips as $trip) {
            DB::table('trip_has_country')->insert([
                'trip_id' => $trip->id,
                'country_id' => $countries->random()->id,
            ]);
        }
    }
}

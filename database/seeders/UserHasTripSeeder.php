<?php

namespace Database\Seeders;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UserHasTripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $trips = Trip::all();
        $user = User::all();

        foreach ($trips as $trip) {
            DB::table('user_has_trip')->insert([
                'user_id' => $user->random()->id,
                'trip_id' => $trip->id,
                'type' => Arr::random(['owner', 'guest']),
                'status' => Arr::random(['done', 'closed', 'waiting'])
            ]);
        }
    }
}

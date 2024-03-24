<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UserHasFriendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            DB::table('user_has_friends')->insert([
                'user_id' => $user->id,
                'friendId' => $users->random()->id,
                'accepted' => (bool)rand(0, 1)
            ]);
        }
    }
}

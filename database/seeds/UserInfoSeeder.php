<?php

use App\Models\User;
use App\Models\UserInfo;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

        foreach ($users as $user) {
            UserInfo::create([
                'user_id'   => $user->id,
                'address'   => $faker->address(),
                'phone'     => $faker->phoneNumber(),
                'birth'     => $faker->date()
            ]);
        }
    }
}

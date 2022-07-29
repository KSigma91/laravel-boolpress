<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'      => 'Pinco',
                'email'     => 'pinco@gmail.com',
                'password'  => Hash::make('pinco')
            ],
            [
                'name'      => 'Panco',
                'email'     => 'panco@gmail.com',
                'password'  => Hash::make('panco')
            ],
            [
                'name'      => 'MarioRossi',
                'email'     => 'mario.rossi@gmail.com',
                'password'  => Hash::make('mario')
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }

    }
}

<?php

use Illuminate\Database\Seeder;

class userSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'chahrazed',
            'email' => 'khoudichahrazed@gmail.com',
            'password' => Hash::make('chouchou'),
            'role' => 'admin' // admin
            ];

        DB::table('users')->insert($user);
    }
}

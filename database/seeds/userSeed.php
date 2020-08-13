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
            'nom' => 'Khoudi',
            'prenom' => 'chahrazed',
            'email' => 'khoudichahrazed@gmail.com',
            'phone' => '0554648378',
            'password' => Hash::make('chouchou'),
            'role' => 'admin' // admin
            ];

        DB::table('users')->insert($user);
    }
}

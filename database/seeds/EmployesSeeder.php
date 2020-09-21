<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EmployesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employe = [
            'nom' => 'ighil mellah',
            'prenom' => 'thanina',
            'email' => 'thanina@gmail.com',
            'phone' => '0789037656',
            'role' => 'commercial', // admin
            'admin_id' => 1 
            ];

        DB::table('employees')->insert($employe);
    }
}

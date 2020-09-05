<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(commandeSeeder::class);
        $this->call(factureSeeder::class);
        $this->call(userSeed::class);
        $this->call(EmployesSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(ProspectSeeder::class);
     
    }
}

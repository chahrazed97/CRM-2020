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
        //$this->call(userSeed::class);
        //$this->call(EmployesSeeder::class);
        //$this->call(ClientSeeder::class);
        //$this->call(ProspectSeeder::class);
        //$this->call(commandeSeeder::class);
        //$this->call(factureSeeder::class); 
        //$this->call(produitSeeder::class);
        //$this->call(comm_prodSeeder::class);
        $this->call(promoSeeder::class);
    }   
}

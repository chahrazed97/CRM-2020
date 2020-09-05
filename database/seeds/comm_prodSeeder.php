<?php

use Illuminate\Database\Seeder;

class comm_prodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('commande_produit')->delete();
        for($i = 0; $i < 70; ++$i)
        {
            DB::table('commande_produit')->insert([
                'commande_id' => rand(1,70),
                'produit_id' => rand(142,153)
            ]);
        }
    }
}

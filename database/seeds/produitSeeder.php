<?php

use Illuminate\Database\Seeder;
use Carbon\carbon;

class produitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function randDate()
    {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    }


public function run()
    {
    //DB::table('commande')->delete();

    for($i = 0; $i < 12; ++$i)
    {
        $mode_pay = array('tablette F7', 'téléphone J7', 'climatiseur J24', 'frigo F89', 'cuisinière F45');
        $randomElement = $mode_pay[array_Rand($mode_pay, 1)];
        $date = $this->randDate();
        DB::table('produit')->insert([
            'ref_prod' => 'COM/LPMO/0' . $i,
            'nom' => $randomElement.$i,
            'type' => 'electronique',
            'prix' => rand(10000, 100000),   
            'taux_tva' => rand(10,30),
            'commande_id' => rand(3, 32),
            'created_at' => $date,
            'updated_at' => $date
            ]);
        }
    }
}

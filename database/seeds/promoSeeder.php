<?php

use Illuminate\Database\Seeder;
use Carbon\carbon;

class promoSeeder extends Seeder
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
        for($i = 0; $i < 12; ++$i)
        {
            $date = $this->randDate();
            DB::table('promotion')->insert([
                'titre' => 'Promo'.$i,
                'start_date' => $date,
                'end_date' => $date,
                'produit_id' => rand(1,12),
                'pourcetage_promo' => rand(10, 60),
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
    }
}

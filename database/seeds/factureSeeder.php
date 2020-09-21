<?php

use Illuminate\Database\Seeder;
use Carbon\carbon;

class factureSeeder extends Seeder
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
        DB::table('facture')->delete();
    
        for($i = 0; $i < 30; ++$i)
        {
            $mode_pay = array('paybal', 'dhahabia', 'visa', 'CIB');
            $randomElement = $mode_pay[array_Rand($mode_pay, 1)];
            $date = $this->randDate();
            DB::table('facture')->insert([
                'num_fac' => 'AZ/LPMO/0' . $i,
                'date_fac' => $date,
                'total' => rand(1000, 100000),
                'mode_payement' => $randomElement,
                'commande_id' => rand(3,32),
                'created_at' => $date,
                'updated_at' => $date
                ]);
            }
        }
    }


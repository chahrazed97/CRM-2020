<?php

use Illuminate\Database\Seeder;
use Carbon\carbon;

class commandeSeeder extends Seeder
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

    for($i = 0; $i < 70; ++$i)
    {
        $mode_pay = array('paybal', 'dhahabia', 'visa', 'CIB');
        $randomElement = $mode_pay[array_Rand($mode_pay, 1)];
        $date = $this->randDate();
        DB::table('commande')->insert([
            'num_comm' => 'COM/LPMO/0' . $i,
            'date_comm' => $date,
            'mode_payement' => $randomElement,
            'clients_id' => rand(1,30),
            'created_at' => $date,
            'updated_at' => $date
            ]);
        }
    }
}

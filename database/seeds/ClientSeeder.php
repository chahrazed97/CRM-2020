<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ClientSeeder extends Seeder
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
        DB::table('clients')->delete();

		for($i = 0; $i < 10; ++$i)
		{
            $pays = array('Algérie', 'Allemagne', 'Égypte', 'France', 'Maroc', 'Tunisie', 'Turquie');
            $randomElement = $pays[array_Rand($pays, 1)];
            $date = $this->randDate();
			DB::table('clients')->insert([
                'nom' => 'Nom' . $i,
                'prenom' => 'prenom' . $i,
                'phone' => '0000000' . $i,
                'email' => 'email' . $i . '@gmail.com',
                'metier' => 'metier'.$i,
                'code_postal' => '150014',
                'date_naissance' => $date,
                'pays' => $randomElement,
                'employee_id' => 1,
                'admin_id' => 1,
                'pays_id' => 3,
                'created_at' => $date,
				'updated_at' => $date
			]);
		}
    }
}

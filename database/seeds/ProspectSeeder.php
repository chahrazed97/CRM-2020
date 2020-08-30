<?php

use Illuminate\Database\Seeder;
use Carbon\carbon;

class ProspectSeeder extends Seeder
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
        DB::table('prospect')->delete();

		for($i = 0; $i < 10; ++$i)
		{
            $date = $this->randDate();
			DB::table('prospect')->insert([
                'nom' => 'Nom' . $i,
                'prenom' => 'prenom' . $i,
                'phone' => '0000000' . $i,
                'email' => 'email' . $i . '@blop.fr',
                'adresse' => 'adresse'.$i,
                'code_postal' => '150014',
                'date_naissance' => $date,
                'pays' => 'Algeria',
                'employee_id' => 31,
                'admin_id' => 1,
                'created_at' => $date,
				'updated_at' => $date
			]);
		}
    }
    
}

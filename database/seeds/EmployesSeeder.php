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

    private function randDate()
	{
		return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	}
    public function run()
    {
        DB::table('employees')->delete();

		for($i = 0; $i < 30; ++$i)
		{
            $date = $this->randDate();
			DB::table('employees')->insert([
                'nom' => 'Nom' . $i,
                'prenom' => 'prenom' . $i,
                'phone' => '0000000' . $i,
                'email' => 'email' . $i . '@blop.fr',
                'role' => 'role' .$i,
                'admin_id' => 1,
                'created_at' => $date,
                'updated_at' => $date
                
			]);
		}
    }
}

<?php

use App\Fournisseurs;
use Illuminate\Database\Seeder;

class FournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

		for ($i = 0; $i < 10; $i++){
			Fournisseurs::create([
				'code' => $faker->name(),
				'nom' => $faker->lastName(),
				'contact' => $faker->phoneNumber(),
				'addresse' => $faker->streetName(),
			]);
		}
    }
}

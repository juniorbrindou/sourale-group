<?php

use App\Clients;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

		for ($i = 0; $i < 100; $i++){
			Clients::create([
				'nom' => $faker->name(),
				'prenoms' => $faker->lastName(),
				'contact1' => $faker->phoneNumber(),
				'contact2' => $faker->phoneNumber(),
				'adresse' => $faker->streetName(),
				'user_id' => 1,
			]);
		}
    }
}

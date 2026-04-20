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
        if (Fournisseurs::count() > 0) {
            return;
        }

        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            Fournisseurs::create([
                'code' =>  date("Ymd") . '0' . $i,
                'nom' => $faker->name() . ' ' . $faker->lastName(),
                'contact' => $faker->phoneNumber(),
                'adresse' => $faker->streetName(),
            ]);
        }
    }
}

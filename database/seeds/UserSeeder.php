<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        User::truncate();

        User::create([
            'login' => 'secretaire',
            'nom' => $faker->name(),
            'prenoms' => $faker->lastName(),
            'tel1' => $faker->phoneNumber(),
            'tel2' => $faker->phoneNumber(),
            'password' => Hash::make('sourale-group'),
        ]);

        User::create([
            'login' => 'manager',
            'nom' => $faker->name(),
            'prenoms' => $faker->lastName(),
            'tel1' => $faker->phoneNumber(),
            'tel2' => $faker->phoneNumber(),
            'password' => Hash::make('sourale-group'),
        ]);


        User::create([
            'login' => 'administrateur',
            'nom' => 'administrateur',
            'password' => Hash::make('sourale-group'),
        ]);


        User::create([
            'login' => 'root',
            'nom' => 'Dev',
            'prenoms' => 'Dev',
            'password' => Hash::make('Inges@2021'),
        ]);
    }
}

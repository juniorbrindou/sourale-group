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
        User::truncate();

        User::create([
            'login' => 'administrateur',
            'nom' => 'administrateur',
            'password' => Hash::make('sourale-group'),
        ]);


        User::create([
            'login' => 'root',
            'nom' => 'Dev',
            'password' => Hash::make('Inges@2021'),
        ]);
    }
}

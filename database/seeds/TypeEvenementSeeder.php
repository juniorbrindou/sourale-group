<?php

use App\Type_evenements;
use Illuminate\Database\Seeder;

class TypeEvenementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        $datas = ['Mariage', 'Bapteme', 'Divorce'];

        foreach ($datas as $data => $value) {
            Type_evenements::create([
                'code' =>  date("Ymd") . '0' . $data,
                'libelle' => $value,
            ]);
        }
    }
}

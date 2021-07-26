<?php

use App\Type_packages;
use Illuminate\Database\Seeder;

class TypePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        $datas = ['Gold', 'Standart', 'Plume'];
        
        foreach ($datas as $data =>$value){
			Type_packages::create([
				'code' =>  date("Ymd").'-0'.$data,
				'libelle' => $value,
				'description' => $faker->realText()
			]);
		}
    }
}

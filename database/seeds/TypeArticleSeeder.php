<?php

use App\Type_articles;
use Illuminate\Database\Seeder;

class TypeArticleSeeder extends Seeder
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
			Type_articles::create([
				'code' =>  date("Ymd").'-0'.$data,
				'libelle' => $value,
			]);
		}
    }
}

<?php

use App\Categorie_articles;
use Illuminate\Database\Seeder;

class CategorieArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = ['Bronze', 'Silver', 'Millénium'];
        foreach ($datas as $data => $value) {
            Categorie_articles::create([
                'code' =>  date("Ymd") . '0' . $data,
                'libelle' => $value,
            ]);
        }
    }
}

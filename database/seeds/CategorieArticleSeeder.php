<?php

use App\Categories;
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
            Categories::create([
                'code' =>  date("Ymd") . '0' . $data,
                'libelle' => $value,
            ]);
        }
    }
}

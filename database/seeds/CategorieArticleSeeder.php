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
        $datas = ['Essentiel', 'Privilège', 'Prestige'];

        foreach ($datas as $data => $value) {
            Categories::firstOrCreate(
                ['libelle' => $value],
                ['code' =>  date("Ymd") . '0' . $data]
            );
        }
    }
}

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
        $types = [
            '00001' => 'Chaise',
            '00002' => 'Couvert',
            '00003' => 'Table',
            '00004' => 'Verre',
            '00005' => 'Assiette',
            '00006' => 'Nappe',
            '00007' => 'Serviette',
            '00008' => 'Plat',
            '00009' => 'Chafing Dish',
            '00010' => 'Tente / Chapiteau',
        ];

        foreach ($types as $code => $libelle) {
            Type_articles::firstOrCreate(
                ['code' => $code],
                ['libelle' => $libelle]
            );
        }
    }
}

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

        $datas = ['Chaise', 'Table', 'Accessoires de décoration', 'Lounge', 'Buffets et mange-debout', 'Equip', 'Matériel d\'animation', 'Luminaires', 'Nappes et Serviettes', 'Plantes artificielles', 'Paravents, cloisons, vestiaires et maquillage', 'Matériel d\'accueil et accessoires conférence', 'Moquette, pistes de danse et éclairage'];

        foreach ($datas as $data => $value) {
            Type_articles::create([
                'code' => date("Ymd") . '0' . $data,
                'libelle' => $value,
                'description' => $faker->realText()
            ]);
        }
    }
}

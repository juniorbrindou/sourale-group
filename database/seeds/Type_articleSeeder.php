<?php

use App\Type_articles;
use Illuminate\Database\Seeder;

class Type_articleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type_articles::create(
            [
                'code' => '00001',
                'libelle' => 'Chaise',
            ]
        );

        Type_articles::create(
            [
                'code' => '00002',
                'libelle' => 'Couvert',
            ]
        );
    }
}

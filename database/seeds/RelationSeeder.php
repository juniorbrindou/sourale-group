<?php

use App\Tarification;
use App\Type_articles;
use Illuminate\Database\Seeder;

class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tarification::firstOrCreate(
            [
                'categorie_article_id' => 1,
                'type_article_id' => 1,
            ],
            ['prix' => 200]
        );

        Tarification::firstOrCreate(
            [
                'categorie_article_id' => 2,
                'type_article_id' => 1,
            ],
            ['prix' => 700]
        );

        Tarification::firstOrCreate(
            [
                'categorie_article_id' => 3,
                'type_article_id' => 1,
            ],
            ['prix' => 1200]
        );

        Tarification::firstOrCreate(
            [
                'categorie_article_id' => 1,
                'type_article_id' => 2,
            ],
            ['prix' => 350]
        );

        Tarification::firstOrCreate(
            [
                'categorie_article_id' => 2,
                'type_article_id' => 2,
            ],
            ['prix' => 600]
        );

        Tarification::firstOrCreate(
            [
                'categorie_article_id' => 3,
                'type_article_id' => 2,
            ],
            ['prix' => 800]
        );
    }
}

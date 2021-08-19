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
        Tarification::create(
            [
                'prix' => 200,
                'categorie_article_id' => 1,
                'type_article_id' => 1,
            ]
        );

        Tarification::create(
            [
                'prix' => 700,
                'categorie_article_id' => 2,
                'type_article_id' => 1,
            ]
        );
        Tarification::create(
            [
                'prix' => 1200,
                'categorie_article_id' => 3,
                'type_article_id' => 1,
            ]
        );
        Tarification::create(
            [
                'prix' => 350,
                'categorie_article_id' => 1,
                'type_article_id' => 2,
            ]
        );
        Tarification::create(
            [
                'prix' => 600,
                'categorie_article_id' => 2,
                'type_article_id' => 2,
            ]
        );
        Tarification::create(
            [
                'prix' => 800,
                'categorie_article_id' => 3,
                'type_article_id' => 2,
            ]
        );
    }
}

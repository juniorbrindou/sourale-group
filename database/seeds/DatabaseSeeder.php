<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorieArticleSeeder::class,
            ClientSeeder::class,
            TypeEvenementSeeder::class,
            TypeArticleSeeder::class,
            FournisseurSeeder::class,
        ]);
    }
}

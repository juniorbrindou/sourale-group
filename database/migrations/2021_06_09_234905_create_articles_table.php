<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('libelle');
            $table->string('description')->nullable();
            $table->string('article_photo')->nullable();

            $table->integer('user_id')->unsigned();
            $table->integer('type_article_id')->unsigned()->nullable();
            $table->integer('remarque_id')->unsigned()->nullable();
            // Errreur : a corriger c'est plutot la table remarque qui doit avoir l'identifiant de l'article
            $table->integer('categorie_id')->unsigned()->nullable();
            $table->timestamps();
            // Vue : qte_article_en_stock,
            // champs ambigue : prix moyen


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}

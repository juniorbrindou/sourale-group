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
            $table->string('nom');
            $table->string('code')->nullable();
            $table->integer('qte');
            $table->integer('caution')->nullable();
            $table->string('description')->nullable();
            $table->string('couleur')->nullable();
            $table->string('taille')->nullable();
            $table->integer('prix');
            $table->integer('reduction')->nullable();
            $table->integer('prix_reduit')->nullable();


            $table->integer('user_id')->unsigned();
            $table->integer('autre_detail_id')->unsigned()->nullable();
            $table->integer('commentaire_id')->unsigned()->nullable();
            $table->integer('categorie_article_id')->unsigned()->nullable();
            $table->timestamps();
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

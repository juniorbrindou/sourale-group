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
            $table->integer('qte_en_stock')->default(0);
            $table->integer('qte_stocker')->default(0);
            $table->float('prix_tarification')->default(0);

            $table->integer('user_id')->unsigned();
            $table->integer('type_article_id')->unsigned()->nullable();
            $table->integer('remarque_id')->unsigned()->nullable();
            $table->integer('categorie_id')->unsigned()->nullable();
            $table->integer('tarification_id')->unsigned()->nullable();
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

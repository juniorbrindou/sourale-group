<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_packages', function (Blueprint $table) {
            $table->id();
            $table->integer('qte_article')->nullable();
            $table->integer('prix_unitaire_package')->nullable();


            $table->integer('article_id')->unsigned();
            $table->integer('package_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            // article_package(#article_id #package_id qte_article prix_unitaire_package)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_packages');
    }
}

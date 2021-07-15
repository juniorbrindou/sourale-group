<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrees', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->integer('qte_recu')->nullable();
            $table->integer('prix_achat_unitaire')->nullable();
            $table->date('date_reception')->nullable();

            $table->integer('user_id')->unsigned();
            $table->integer('article_id')->unsigned();
            $table->integer('fournisseur_id')->nullable()->unsigned();

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
        Schema::dropIfExists('entrees');
    }
}

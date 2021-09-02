<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->integer('qte_loue');
            $table->integer('qte_retour')->nullable();
            $table->integer('nb_jour')->default(1);
            $table->integer('total_une_ligne')->default(0);
            $table->string('status')->default('Enregistré')->comment('0:Enregistré, 1:En Cours, 2:Terminé');
            $table->timestamp('date_location')->nullable();
            $table->timestamp('date_retour')->nullable();

            $table->integer('user_id')->unsigned();
            $table->integer('article_id')->unsigned();
            $table->integer('evenement_id')->unsigned();
            $table->integer('client_id')->unsigned();

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
        Schema::dropIfExists('locations');
    }
}

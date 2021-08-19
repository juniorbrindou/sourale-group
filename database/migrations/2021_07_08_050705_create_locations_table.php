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
            $table->float('prix_unitaire')->nullable();
            $table->integer('status')->default(0)->comment('0:etatt initial pas de destockage, 1 : Validation. Appliquer le destockage, 2 : le retour de stock. restokage');
            $table->date('date_location')->nullable();
            $table->date('date_retour')->nullable();

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

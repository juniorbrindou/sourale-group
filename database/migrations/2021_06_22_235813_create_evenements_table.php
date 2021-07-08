<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('description')->nullable();
            $table->integer('lieu')->nullable();


            $table->integer('client_id')->unsigned()->nullable();
            $table->timestamps();
            // evenement(code libelle nbr_personne #package_id lieu date_evenement description #type_event_id)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evenements');
    }
}

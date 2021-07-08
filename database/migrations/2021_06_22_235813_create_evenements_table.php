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
            $table->string('code');
            $table->string('libelle');
            $table->integer('nbr_personne')->nullable();
            $table->string('lieu')->nullable();
            $table->string('description')->nullable();
            $table->date('date_evenement')->nullable();
			$table->integer('type_evenement_id')->unsigned();
			$table->integer('package_id')->unsigned();
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

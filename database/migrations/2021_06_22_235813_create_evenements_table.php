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
            $table->string('libelle')->comment('Mariage, bapteme');
            $table->integer('nbr_personne')->nullable();
            $table->string('lieu')->nullable();
            $table->string('status')->nullable()->comment('A venir, En Cours, Terminé, Cloturé, À Confirmer');
            $table->string('description')->nullable();
            $table->integer('caution')->nullable();
            $table->date('date_evenement')->nullable();
            $table->integer('type_evenement_id')->nullable()->unsigned();
            $table->integer('package_id')->nullable()->unsigned();
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
        Schema::dropIfExists('evenements');
    }
}

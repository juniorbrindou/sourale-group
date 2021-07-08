<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_evenements', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('libelle');
            $table->string('description')->nullable();

            $table->timestamps();
            // type_event(code libelle description)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_evenements');
    }
}

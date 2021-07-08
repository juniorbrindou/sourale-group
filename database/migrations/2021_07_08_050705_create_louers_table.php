<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLouersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('louers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('libelle');
            $table->string('description')->nullable();
            $table->integer('qte_loue')->nullable();
            $table->integer('qte_retour')->nullable();
            $table->date('date_location')->nullable();
            $table->date('date_retour')->nullable();

            $table->integer('user_id')->unsigned();
            $table->integer('article_id')->unsigned();

            $table->timestamps();
            // louer(#article_id qte_loue date_location date_retour qte_retour)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('louers');
    }
}

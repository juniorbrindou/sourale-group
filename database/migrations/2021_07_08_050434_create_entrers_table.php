<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->integer('qte_recu')->nullable();
            $table->integer('prix_achat_unitaire')->nullable();
            $table->dateTime('date_reception')->useCurrent();

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

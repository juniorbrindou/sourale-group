<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->integer('qte');
            $table->date('date_commande');
            $table->date('date_livraison');
            $table->date('date_fin')->nullable();
            $table->string('lieu_livraison')->nullable();
            $table->integer('article_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('facture_id')->unsigned();
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
        Schema::dropIfExists('commandes');
    }
}

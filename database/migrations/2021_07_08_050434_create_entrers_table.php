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
            $table->dateTime('date_entre')->useCurrent();
            $table->boolean('isValidated')->default(0);

            $table->integer('user_id')->unsigned();
            // $table->integer('fournisseur_id')->nullable()->unsigned()->comment('Inutile maintenant');

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
        Schema::dropIfExists('entrers');
    }
}

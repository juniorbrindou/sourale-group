<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factures', function (Blueprint $table) {
			$table->id();
			$table->string('code')->nullable();
			$table->string('libelle');
			$table->date('date_creation');
			$table->integer('caution')->nullable();
			// $table->integer('prix_location_recu');
			// $table->integer('client_id');
			// $table->integer('total')->nullable();

			$table->integer('user_id')->unsigned();
			$table->integer('evenement_id')->unsigned();
			$table->timestamps();
			// facture(code libelle #event_id)
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('factures');
	}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContraintesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//table reglements
		Schema::table('reglements', function (Blueprint $table) {
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('facture_id')
				->references('id')
				->on('factures')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		//table entrers
		Schema::table('entrers', function (Blueprint $table) {
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('fournisseur_id')
				->references('id')
				->on('fournisseurs')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		//table users
		Schema::table('users', function (Blueprint $table) {
			$table->foreign('role_id')
				->references('id')
				->on('roles')
				->onDelete('cascade')
				->onUpdate('cascade');
		});


		//table articles
		Schema::table('articles', function (Blueprint $table) {
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');


			$table->foreign('remarque_id')
				->references('id')
				->on('remarques')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('type_article_id')
				->references('id')
				->on('type_articles')
				->onDelete('restrict')
				->onUpdate('cascade');

			$table->foreign('categorie_id')
				->references('id')
				->on('categories')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		//table article_packages
		Schema::table('article_packages', function (Blueprint $table) {
			$table->foreign('package_id')
				->references('id')
				->on('packages')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('article_id')
				->references('id')
				->on('articles')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		//table clients
		Schema::table('clients', function (Blueprint $table) {
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');
		});




		//table evenements
		Schema::table('evenements', function (Blueprint $table) {
			$table->foreign('type_evenement_id')
				->references('id')
				->on('type_evenements')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('package_id')
				->references('id')
				->on('packages')
				->onDelete('cascade')
				->onUpdate('cascade');
		});


		//table factures
		Schema::table('factures', function (Blueprint $table) {
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');


			$table->foreign('evenement_id')
				->references('id')
				->on('evenements')
				->onDelete('cascade')
				->onUpdate('cascade');
		});



		//table locations
		Schema::table('locations', function (Blueprint $table) {
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('article_id')
				->references('id')
				->on('articles')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('evenement_id')
				->references('id')
				->on('evenements')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		//table packages
		Schema::table('packages', function (Blueprint $table) {
			$table->foreign('categorie_id')
				->references('id')
				->on('categories')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		//table destockages
		Schema::table('destockages', function (Blueprint $table) {
			$table->foreign('article_id')
				->references('id')
				->on('articles')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		//table ligne_entrers
		Schema::table('ligne_entrers', function (Blueprint $table) {
			$table->foreign('article_id')
				->references('id')
				->on('articles')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('entrer_id')
				->references('id')
				->on('entrers')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->dropForeign('users_role_id_foreign');
		});

		Schema::table('articles', function (Blueprint $table) {
			$table->dropForeign('articles_user_id_foreign');
			$table->dropForeign('articles_remarque_id_foreign');
			$table->dropForeign('articles_type_article_id_foreign');
			$table->dropForeign('articles_categorie_id_foreign');
		});

		Schema::table('article_packages', function (Blueprint $table) {
			$table->dropForeign('article_packages_package_id_foreign');
			$table->dropForeign('article_packages_article_id_foreign');
		});

		Schema::table('clients', function (Blueprint $table) {
			$table->dropForeign('clients_user_id_foreign');
		});



		Schema::table('factures', function (Blueprint $table) {
			$table->dropForeign('factures_user_id_foreign');
			$table->dropForeign('factures_evenement_id_foreign');
		});

		Schema::table('reglements', function (Blueprint $table) {
			$table->dropForeign('reglements_user_id_foreign');
			$table->dropForeign('reglements_facture_id_foreign');
		});

		Schema::table('locations', function (Blueprint $table) {
			$table->dropForeign('locations_user_id_foreign');
			$table->dropForeign('locations_article_id_foreign');
			$table->dropForeign('locations_evenement_id_foreign');
		});

		Schema::table('evenements', function (Blueprint $table) {
			$table->dropForeign('evenements_type_evenement_id_foreign');
			$table->dropForeign('evenements_package_id_foreign');
		});

		Schema::table('entrers', function (Blueprint $table) {
			$table->dropForeign('entrers_user_id_foreign');
			$table->dropForeign('entrers_fournisseur_id_foreign');
		});

		Schema::table('packages', function (Blueprint $table) {
			$table->dropForeign('packages_categorie_id_foreign');
		});

		Schema::table('destockages', function (Blueprint $table) {
			$table->dropForeign('destockages_article_id_foreign');
		});

		Schema::table('ligne_entrers', function (Blueprint $table) {
			$table->dropForeign('ligne_entrers_article_id_foreign');
			$table->dropForeign('ligne_entrers_entrer_id_foreign');
		});
	}
}

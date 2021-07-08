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
		//table packages
		Schema::table('packages', function (Blueprint $table) {
			$table->foreign('type_package_id')
					->references('id')
					->on('type_packages')
					->onDelete('cascade')
					->onUpdate('cascade');
		});

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

		//table entrees
		Schema::table('entrees', function (Blueprint $table) {
			$table->foreign('user_id')
					->references('id')
					->on('users')
					->onDelete('cascade')
					->onUpdate('cascade');

			$table->foreign('article_id')
					->references('id')
					->on('factures')
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

			
			$table->foreign('commentaire_id')
					->references('id')
					->on('commentaires')
					->onDelete('cascade')
					->onUpdate('cascade');

			$table->foreign('type_article_id')
					->references('id')
					->on('commentaires')
					->onDelete('cascade')
					->onUpdate('cascade');

			$table->foreign('categorie_article_id')
					->references('id')
					->on('categorie_articles')
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


		//table commandes
		Schema::table('commandes', function (Blueprint $table) {
			$table->foreign('article_id')
					->references('id')
					->on('articles')
					->onDelete('cascade')
					->onUpdate('cascade');

			$table->foreign('client_id')
					->references('id')
					->on('clients')
					->onDelete('cascade')
					->onUpdate('cascade');

			$table->foreign('facture_id')
					->references('id')
					->on('factures')
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

			// $table->foreign('client_id')
			// 		->references('id')
			// 		->on('clients')
			// 		->onDelete('cascade')
			// 		->onUpdate('cascade');

			$table->foreign('evenement_id')
					->references('id')
					->on('evenements')
					->onDelete('cascade')
					->onUpdate('cascade');
		});

		//table commentaires
		Schema::table('commentaires', function (Blueprint $table) {
			$table->foreign('user_id')
					->references('id')
					->on('users')
					->onDelete('cascade')
					->onUpdate('cascade');
		});

		//table louers
		Schema::table('louers', function (Blueprint $table) {
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
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('packages', function (Blueprint $table) {
			$table->dropForeign('packages_type_package_id_foreign');
		});

		Schema::table('users', function (Blueprint $table) {
			$table->dropForeign('users_role_id_foreign');
		});

		Schema::table('articles', function (Blueprint $table) {
			$table->dropForeign('articles_user_id_foreign');
			$table->dropForeign('articles_commentaire_id_foreign');
			$table->dropForeign('articles_type_article_id_foreign');
			$table->dropForeign('articles_categorie_article_id_foreign');
		});

		Schema::table('article_packages', function (Blueprint $table) {
			$table->dropForeign('article_packages_package_id_foreign');
			$table->dropForeign('article_packages_article_id_foreign');
		});

		Schema::table('clients', function (Blueprint $table) {
			$table->dropForeign('clients_user_id_foreign');
		});

		Schema::table('commandes', function (Blueprint $table) {
			$table->dropForeign('commandes_article_id_foreign');
			$table->dropForeign('commandes_client_id_foreign');
			$table->dropForeign('commandes_facture_id_foreign');
		});

		Schema::table('commentaires', function (Blueprint $table) {
			$table->dropForeign('commentaires_user_id_foreign');
		});

		Schema::table('factures', function (Blueprint $table) {
			$table->dropForeign('factures_user_id_foreign');
			$table->dropForeign('factures_evenement_id_foreign');
			// $table->dropForeign('factures_client_id_foreign');
		});

		Schema::table('reglements', function (Blueprint $table) {
			$table->dropForeign('reglements_user_id_foreign');
			$table->dropForeign('reglements_facture_id_foreign');
		});

		Schema::table('louers', function (Blueprint $table) {
			$table->dropForeign('louers_user_id_foreign');
			$table->dropForeign('louers_article_id_foreign');
		});

		Schema::table('entrees', function (Blueprint $table) {
			$table->dropForeign('entrees_user_id_foreign');
			$table->dropForeign('entrees_article_id_foreign');
			$table->dropForeign('entrees_fournisseur_id_foreign');
		});


	}
}

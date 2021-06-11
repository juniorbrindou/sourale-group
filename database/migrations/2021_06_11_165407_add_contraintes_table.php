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
		Schema::table('packages', function (Blueprint $table) {
			$table->foreign('type_package_id')->references('id')->on('type_packages')->onDelete('cascade')->onUpdate('cascade');
		});

		Schema::table('users', function (Blueprint $table) {
			$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
		});


		Schema::table('articles', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('autre_detail_id')->references('id')->on('autre_details')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('commentaire_id')->references('id')->on('commentaires')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('categorie_article_id')->references('id')->on('categorie_articles')->onDelete('cascade')->onUpdate('cascade');
		});

		Schema::table('package_articles', function (Blueprint $table) {
			$table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade')->onUpdate('cascade');
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
			$table->dropForeign('articles_autre_detail_id_foreign');
			$table->dropForeign('articles_commentaire_id_foreign');
			$table->dropForeign('articles_categorie_article_id_foreign');
		});

		Schema::table('package_articles', function (Blueprint $table) {
			$table->dropForeign('package_articles_package_id_foreign');
			$table->dropForeign('package_articles_article_id_foreign');
		});

	}
}

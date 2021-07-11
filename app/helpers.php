<?php

/**
 * Fonction utili
 **/

if (! function_exists('page_title')) {
	function page_title(){

		if (request()->is('dashboard')) {
			echo 'Tableau de bord';
		}else if (request()->is('articles')){
			echo 'Articles';
		}else if (request()->is('dashboard')){
			echo 'string';
		}else if (request()->is('dashboard')){
			echo 'string';
		}else if (request()->is('dashboard')){
			echo 'string';
		}else if (request()->is('dashboard')){
			echo 'string';
		}else if (request()->is('dashboard')){
			echo 'string';
		}else if (request()->is('dashboard')){
			echo 'string';
		}else if (request()->is('dashboard')){
			echo 'string';
		}else{
			echo '';
		}
	}
}

if (! function_exists('getTile')) {
	/**
	 * Retourne un titre dynamique pour le titre des pages
	 * @return Title @string 
	*/
	function getTile(){

		if (request()->is('dashboard')) {
			return 'Tableau de bord';

		}else if (request()->is('categorieArticles*')){
			return 'Catégories d\'articles';

		}else if (request()->is('clients*')){
			return 'Clients';

		}else if (request()->is('fournisseurs*')){
			return 'Fournisseurs';

		}else if (request()->is('typeArticles*')){
			return 'Type des articles';

		}else if (request()->is('typeEvenements*')){
			return 'Type d\'événements';

		}else if (request()->is('typePackages*')){
			return 'Type de package';

		}else if (request()->is('users*')){
			return 'Utilisateurs';

		}else{
			echo '';
		}
	}
}
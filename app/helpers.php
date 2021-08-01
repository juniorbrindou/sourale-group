<?php

/**
 * Fonction utili
 **/

if (!function_exists('page_title')) {
	function page_title()
	{

		$title = last(request()->segments());
		return $title;
	}
}

if (!function_exists('getTile')) {
	/**
	 * Retourne un titre dynamique pour le titre des pages
	 * @return Title @string 
	 */
	function getTile()
	{

		if (request()->is('dashboard')) {
			return 'Tableau de bord';
		} else if (request()->is('categorieArticles*')) {
			return 'Catégories d\'articles';
		} else if (request()->is('clients*')) {
			return 'Clients';
		} else if (request()->is('fournisseurs*')) {
			return 'Fournisseurs';
		} else if (request()->is('typeArticles*')) {
			return 'Type des articles';
		} else if (request()->is('typeEvenements*')) {
			return 'Type d\'événements';
		} else if (request()->is('users*')) {
			return 'Utilisateurs';
		} else {
			echo '';
		}
	}
}

if (!function_exists('userAvatar')) {
	/**
	 * Recoit le genre de l'utilisateur, retourne un avatar en fonction du genre
	 * @return avatar @string 
	 */
	function userAvatar(string $GenreUser)
	{
		if ($GenreUser === 'Mme') {
			$avatar = asset('dist/img/avatar3.png');
		} elseif ($GenreUser === 'M') {
			$avatar = asset('dist/img/avatar.png');
		} elseif ($GenreUser === 'Mlle') {
			$avatar = asset('dist/img/34.jpg');
		} else {
			$avatar = asset('dist/img/25.jpg');
		}
		return $avatar;
	}
}

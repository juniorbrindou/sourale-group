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

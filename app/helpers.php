<?php

/**
 * Fonction utili
 **/
if(! function_exists('test')){
	function test(){
		echo 'salut tout le monde';
	}
}

if (! function_exists('page_title')) {
	function page_title(){

		if (request()->is('dashboard')) {
			echo 'Tableau de bord';
		}else if (request()->is('dashboard')){
			echo 'string';
		}else{
			echo '';
		}
	}
}

<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::group(
    ['middleware' => 'auth'],
    function () {
        
        Route::get('/', 'DashboardController@dashboard')->name('dashboard');
        Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('articles', 'ArticleController');
        Route::resource('utilisateurs', 'UserController');

        // Parametrage
        Route::resource('categorieArticles', 'CategorieArticleController');
        Route::resource('clients', 'ClientController');
        Route::resource('fournisseurs', 'FournisseursController');
        Route::resource('typeArticles', 'TypeArticlesController');
        Route::resource('typeEvenements', 'TypeEvenementsController');
        Route::resource('typePackages', 'TypePackageController');
        Route::resource('users', 'UserController');

        Route::get('facture',function(){
            return view('facture.index');
        });

    }
);
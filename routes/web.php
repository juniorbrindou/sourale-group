<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::group(
    ['middleware' => 'auth'],
    function () {

        Route::get('/', 'DashboardController@dashboard')->name('dashboard');
        Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('utilisateurs', 'UserController');
        Route::resource('approvisionnement', 'EntrersController');
        Route::resource('destockages', 'DestockageController');
        Route::get('stock', 'StockController@gindex');


        // Parametrage
        Route::group(['prefix' => 'parametrage'], function () {
            Route::resource('articles', 'ArticleController');
            Route::resource('categorieArticles', 'CategorieArticleController');
            Route::resource('clients', 'ClientController');
            Route::resource('fournisseurs', 'FournisseursController');
            Route::resource('typeArticles', 'TypeArticlesController');
            Route::resource('typeEvenements', 'TypeEvenementsController');
            Route::resource('packages', 'PackageController');
            Route::PATCH('users.updatePassword/{user}', 'UserController@updatePassword')->name('users.updatePassword');
            Route::resource('users', 'UserController');
            Route::resource('tarifications', 'TarificationController');
        });

        Route::get('facture', function () {
            return view('facture.index');
        });

        Route::fallback(function () {
            return view('dashboard')->with(['error' => 'Désolé, Cette page n\'exitste pas.']);
        });
    }
);

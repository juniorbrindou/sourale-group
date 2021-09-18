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
        Route::get('stock', 'StockController@index');
        Route::post('locationsCreateClient', 'LocationController@locationsCreateClient')->name('locationsCreateClient');
        // Route::get('location/{$id}', 'EvenementController@show')->name('locations.terminer');
        Route::resource('locations', 'LocationController');
        // Route::get('evennements', 'EvennementController');
        Route::get('facture/{id}', 'FactureController@show')->name('facture.show');


        // Parametrage
        Route::group(['prefix' => 'parametrage', 'middleware' => ['role:admin|super-admin|manager']], function () {
            Route::resource('articles', 'ArticleController');
            Route::resource('categorieArticles', 'CategorieArticleController');
            Route::resource('clients', 'ClientController');
            Route::resource('fournisseurs', 'FournisseursController');
            Route::resource('typeArticles', 'TypeArticlesController');
            Route::resource('typeEvenements', 'TypeEvenementsController');
            Route::resource('packages', 'PackageController');
            Route::resource('tarifications', 'TarificationController');
        });

        Route::group(['prefix' => 'parametrage'], function () {
            Route::resource('users', 'UserController');
            Route::PATCH('users.updatePassword/{user}', 'UserController@updatePassword')->name('users.updatePassword');
        });

        Route::fallback(function () {
            return redirect('dashboard')->with(['error' => 'Désolé, Cette page n\'exitste pas.']);
        });
    }
);

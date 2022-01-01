<?php

use Illuminate\Support\Facades\Route;

# Auth
Auth::routes();

Route::group(
    ['middleware' => 'auth'],
    function () {

        # Agenda
         Route::get('/agenda', 'AgendaController@index')->name('agenda.index');
         Route::get('/JsonAgenda', 'AgendaController@JsonIndex');
        //  Route::get('/agenda', 'AgendaController@index')->name('agenda.index');

        # Dashboard
        Route::get('/', 'DashboardController@dashboard')->name('dashboard');
        Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

        # Home
        Route::get('/home', 'HomeController@index')->name('home');

        # Users
        Route::resource('utilisateurs', 'UserController');

        # Approvisionnement
        Route::resource('approvisionnement', 'EntrersController');

        # Destockage
        Route::resource('destockages', 'DestockageController');

        # Stock
        Route::get('/stock', 'StockController@index')->name('stock');

        # Location
        Route::post('locations', 'LocationController@store')->name('locations');
        Route::resource('locations', 'LocationController');

        # Evenements
        Route::resource('evennements', 'EvennementController');

        # Facture
        Route::get('facture/{id}', 'FactureController@show')->name('facture.show');


        # Parametrage
        Route::group(['prefix' => 'parametrage', 'middleware' => ['role:admin|super-admin|manager']], function () {

            # Artciles
            Route::resource('articles', 'ArticleController');

            # Categories d'articles
            Route::resource('categorieArticles', 'CategorieArticleController');

            # Clients
            Route::resource('clients', 'ClientController');

            # Fournisseurs
            Route::resource('fournisseurs', 'FournisseursController');

            # Type Articles
            Route::resource('typeArticles', 'TypeArticlesController');

            # Type d'evenements
            Route::resource('typeEvenements', 'TypeEvenementsController');

            # Packages
            Route::resource('packages', 'PackageController');

            # Tarifications
            Route::resource('tarifications', 'TarificationController');
        });

        Route::group(['prefix' => 'parametrage'], function () {

            # User
            Route::resource('users', 'UserController');
            Route::PATCH('users.updatePassword/{user}', 'UserController@updatePassword')->name('users.updatePassword');
        });

        Route::fallback(function () {
            return redirect('dashboard')->with(['error' => 'Désolé, Cette page n\'exitste pas.']);
        });
    }
);

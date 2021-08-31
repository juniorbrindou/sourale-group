<?php

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Route;

Auth::routes();
route::get('test', function () {
    $test = [];
    // return PDF::loadView('pages.test')
    //     ->setPaper('a4', 'landscape')
    //     ->setWarnings(false)
    //     ->save(public_path("storage/fichier.pdf"))
    //     ->stream();

    // $pdf = App::make('dompdf.wrapper');
    // $pdf->loadHTML('<h1>Test</h1>');
    // return $pdf->stream();

    // $pdf = PDF::loadView('pages.test', $test);
    // return $pdf->download('storage/invoice.pdf');

    // $pdf = PDF::loadView('pages.test', $test);
    // return view('pages.test');
});
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
        Route::resource('locations', 'LocationController');
        Route::resource('evennements', 'EvennementController');


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

        Route::get('facture', function () {
            return view('facture.index');
        });

        Route::fallback(function () {
            return view('dashboard')->with(['error' => 'Désolé, Cette page n\'exitste pas.']);
        });
    }
);

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
        Route::resource('clients', 'ClientController');
        Route::get('newLocation',function(){
            return 'test';
        });
        Route::get('facture',function(){
            return view('facture.index');
        });

    }
);
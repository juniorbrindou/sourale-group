<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// old
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('dashboard', function () {
//     return view('dashboard');
// });
// old

// from branch main
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
// from branch main

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('articles','ArticleController');
// Route::resource('articles','ArticleController')->middleware('auth');

Route::resource('utilisateurs','UserController');

Route::resource('clients','ClientController');

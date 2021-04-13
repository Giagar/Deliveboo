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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//per cambiare aspetti relativi all'autenticazione devo lavorare in views.auth.register.blade(x resa grafica), in
// e in controllers/Auth/RegisterController per creazione dati ristoratore/validazioni

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('user')  //// Qui entro nelle rotte /restaurant
// tra cui restaurant/dashboard dove ho i link 1) alla index crud resource piatti(e da lì a cascata nella crude),
// 2)alla lista ordini 3)alle statistiche degli ordini
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
       Route::resource('dishes', 'DishController');
    });

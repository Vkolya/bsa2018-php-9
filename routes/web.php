<?php

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

Route::get('currencies/add', 'CurrencyController@create')->name('currencies.create');
Route::group(['middleware' => 'auth'], function () {
    Route::resource('currencies', 'CurrencyController')->except([
        'create'
    ]);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/google', 'Auth\SocialAuthController@redirectToProvider')->name('google-login');
Route::get('login/google/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('google-callback');

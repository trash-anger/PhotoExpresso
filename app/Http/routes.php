<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/home');
});



Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/homeAdmin','UserController@homeAdmin');
    Route::get('/homeClient','UserController@homeClient');

    Route::resource('adresse', 'AdresseController');
    Route::resource('client', 'ClientController');
    Route::resource('codeReduction', 'CodeReductionController');
    Route::resource('commande', 'CommandeController');
    Route::resource('format', 'FormatController');
    Route::resource('fraisPort', 'FraisPortController');
    Route::resource('messageAccomp', 'MessageAccompController');
    Route::resource('message', 'MessageController');
    Route::resource('photo', 'PhotoController');
    Route::resource('user', 'UserController');
});
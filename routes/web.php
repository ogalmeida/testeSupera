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

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

  Route::get('/modal/{contract}/{operation}/{config}/{id?}', 'ModalController@getData');

  Route::resource('/contract', 'ContractController')->except('edit');
  Route::resource('/unity', 'UnityController')->except(['index', 'create', 'show', 'edit']);
  Route::resource('/attestation', 'AttestationController')->except(['index', 'create', 'show', 'update', 'edit']);
  Route::resource('/contractUser', 'ContractUserController')->except(['index', 'create', 'show', 'update', 'edit']);

	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});


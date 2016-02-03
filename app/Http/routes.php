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

Route::get('/', 'WelcomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('forum', 'ForumController');
Route::resource('categorie', 'CategorieController');
Route::resource('membre', 'MembreController');
Route::resource('forum/{idForum}/topic', 'TopicController');
Route::resource('forum/{idForum}/topic/{idTopic}/post', 'PostController');

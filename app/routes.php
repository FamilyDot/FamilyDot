<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showHome');

Route::resource('/users','UsersController');

Route::resource('/family','FamilyController');

Route::get('/famdash', 'HomeController@showFamdash');

Route::resource('/answer', 'AnswerController');

Route::get('/login', 'HomeController@showLogin');

Route::post('/login', 'HomeController@doLogin');

// Route::get('/famdash', "HomeController@showLogin");

Route::get('/users', 'HomeController@showLogin');

Route::post('/', 'HomeController@doSignup');

Route::get('/doLogout', 'HomeController@doLogout');


Route::post('/question', 'QuestionController@store');


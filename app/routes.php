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

Route::get('/landing', "HomeController@showLanding");


Route::get('/home', function()
{
    return View::make('landing');
});

Route::get('/user', function()
{
    return View::make('userPage');
});

Route::get('/famDash', function()
{
    return View::make('famDashPage');
});

<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showHome()
	{
		return View::make('home');
	}

	public function showUser($family_id)
	{
		$questions = DB::table('questions')->where('family_id', $family_id)->get();
		return View::make('user')->with("questions", $questions);
	}

	public function showFamdash()
	{
		return View::make('famdash');
	}

	public function showLogin()
	{
		return View::make('login');
	}

}

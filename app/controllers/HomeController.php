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

	public function showUser()
	{
		return View::make('user');
	}

	public function showFamdash()
	{
		return View::make('famdash');
	}

	public function showLogin()
	{
		return View::make('login');
	}

	public function doLogin()
 	{	
 		$email= Input::get('email');
 		$password = Input::get('password');
 
 		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
 	    	return Redirect::intended('/');
 		} else {
 		    // login failed, go back to the login screen
 			return Redirect::back();
 		}
 	}






	// public function doLogin()
	// {	
	// 	$email= Input::get('email');
	// 	$password = Input::get('password');

	// 	if (Auth::attempt(array('email' => $email, 'password' => $password))) {
	//     	return Redirect::action('HomeController@showHome');
	//     	// return View::make('home');
	// } else {
	// 		// Session::flash('errorMessage', 'Please enter correct information');
	// 		// $value = Session::get('errorMessage');
	// 	    // login failed, go back to the login screen
	// 		return Redirect::back();
	// 		}
	// }

}

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
		if (Auth::check()) {
			return Redirect::action('HomeController@showFamdash'); //this is working because i can't go back to login form since i'm already logged in. so make a logout function to test it some more
		} else {
	    	return View::make("login");
		}
	}

	public function doLogin()
 	{	
 		$email= Input::get('email');
 		$password = Input::get('password');
 
 		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
 	    	return Redirect::intended('/famdash');
 		} else {
 		    // login failed, go back to the login screen
 			return Redirect::back();
 		}
 	}

 	public function doSignup()
	{
	  	$user = new User();
	  	$familyName= Input::get('name');
	  	$family = Family::where('name', "=", $familyName)->first();

	    if($family == null) { 
		    $family = new Family();
		    $family->name = $familyName;
		    $family->save();
	   	}

	    $user->email = Input::get('email');
	    $user->password = Input::get('password');
	    $user->username = Input::get('username');
	    $user->birth_day = Input::get('birth_day');
	    $user->first_name = Input::get('first_name');
	    $user->last_name = Input::get('last_name');
	    $user->family_id = $family->id;

	    if(Input::get('password')==Input::get('passwordValidate')){
		   	$user->save();	
	    }else {
	    	dd("It didn't work");
	    }
// Run that shit!
 	}
}




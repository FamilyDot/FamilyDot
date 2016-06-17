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
    if(!Auth::check()){

  		return View::make('home');
    }
    return Redirect::action('UsersController@show', Auth::user()->id);
	}

	public function showFamily()
	{
    $user = Auth::user();

		// $posts=Post::where('family_id', $id)->get();
		// $family=Family::find($id);
		// $users=DB::table('users')->where('family_id', $id)->get();
    // dd(' we are here: HomeController@showFamdash');
		return View::make('family')->with('user', $user);
	}

	public function showLogin()
	{
		if (Auth::check()) {
			return Redirect::action('UsersController@show', Auth::id()); //this is working because i can't go back to login form since i'm already logged in. so make a logout function to test it some more
		} else {
	    	return View::make("login");
		}
	}

	public function doLogin()
 	{
 		$validator = new LoginValidator();
 		$validator->validate(Input::all());

 		$email= Input::get('email');
 		$password = Input::get('password');

 		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
 	    	return Redirect::action('UsersController@show', Auth::user()->id);
 		} else {
 		    // login failed, go back to the login screen
 			return Redirect::back();
 		}
 		return Redirect::action('UsersController@show', $user->id);
 	}

 	public function doSignup()
	{
	    $validator = new SignUpValidator();
	    $validator->validate(Input::all());

	    $family = Family::findOrCreateWithName(Input::get('name'));
	    $user = User::signUp(Input::all(), $family);

	    Session::flash('successMessage', 'We created your account!');
	    return Redirect::action('UsersController@show', $user->id);
  	}

	public function doLogout()
	{
		Auth::logout();
		return View::make("login");
	}

}


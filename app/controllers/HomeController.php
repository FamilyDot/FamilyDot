<?php

class HomeController extends BaseController
{
	public function showHome()
	{

    if(!Auth::check()){

  		return View::make('home');
    }
    return Redirect::action('UsersController@show', Auth::user()->id);

	}

	public function showFamily()
    {
        if(Auth::check()) {
            $user = Auth::user();

            return View::make('family')->with('user', $user);
        }
        return Redirect::action('HomeController@showLogin');
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


        $credentials = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        if (Auth::attempt($credentials)) {
    	    return Redirect::action('UsersController@show', $user->id);   
        }
        // Session::flash('successMessage', 'Wecreated your account!');
  	     // return View::make('home');
    }

	public function doLogout()
	{
		Auth::logout();
		return View::make("login");
	}

}


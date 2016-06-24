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
            $avg = Family::calculateFamilyHappiness();

            $survey = array(
            "How happy are you with the amount og time your family is spending together?",
            "Is your family happy?",
            "How active is your family",
            "How healthy are the foods your family eats",
            "Do you feel like the family has everything it needs?",
            "Money does not play a big part of our happiness",
            "I am comfortable to be myself when I am at home.",
            "Home is my safe place.",
            "How well is your family setting and working towards goals?",
            "Does your family provide encouragement when you need it most?"
            );
            return View::make('family')->with('user', $user)->with('survey', $survey)->with('avg', $avg);
        }
        return Redirect::action('HomeController@showLogin');
	}

	public function showLogin()
	{
		if(Auth::check()) {
			return Redirect::action('UsersController@show', Auth::id()); //this is working because i can't go back to login form since i'm already logged in. so make a logout function to test it some more
		}else{
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
 		}else{
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
    }

	public function doLogout()
	{
		Auth::logout();
		return View::make("login");
	}

}


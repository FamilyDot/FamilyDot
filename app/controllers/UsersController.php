<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
  public function __construct()
  {
      $this->beforeFilter('auth', array('except' => array('/', 'login')));
  }

	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), User::$rules);

		if($validator->fails()) {
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        Session::flash('errorMessage', 'Your Account edit has not been saved');
	        $value = Session::get('successMessage');
	        return Redirect::back()->withInput()->withErrors($validator);
	    } 
	    else 
	    {
	       // validation succeeded, create and save the edit

			$user = new User();
			$user->username =Input::get('username');
			$user->email =Input::get('email');
			$user->picture =Input::get('image_url');
			$user->password =Input::get('password');
			$user->user_id = Auth::id();
			$user->save();

			Session::flash('successMessage', 'Your edit has been saved');
			$value = Session::get('successMessage');
			return Redirect::action ('UsersController@show', $post->id);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

  // #### SECURITY MODEL THAT RESEMBELS GITHUB'S ####
	public function show($id)
	{
		if(Auth::check()) {
      $user = Auth::user();

      $user_of_profile = User::find($id);
      $user_family_id = $user->family_id;

      if($user_of_profile != null && $user_family_id == $user_of_profile->family_id) {

          $user=User::find($id);
      		return View::make('user')->with("user", $user);
      }

      return View::make('errors.missing');
    }


    return View::make('login');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		return View::make('edit')->with(['user'=>$user]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		$user = User::find($id);
		$user->username =Input::get('username');
		$user->email =Input::get('email');
		$user->image_url =Input::get('image_url');
		$user->password =Input::get('password');
		

		if($user -> save())	

			{
			Session::flash('successMessage', 'Your edit has been saved');
			$value = Session::get('successMessage');
			return Redirect::action('UsersController@show', $user->id);
			}
			else
			{
			Session::flash('errorMessage', 'Your Account edit has not been saved');
			return Redirect::back()->withInput();
			}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
		return Redirect::action ('HomeController@showHome');
	}


}

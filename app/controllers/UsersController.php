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
		//
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}

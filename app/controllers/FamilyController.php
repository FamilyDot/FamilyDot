<?php

class FamilyController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array()));
    }

    public function show($id)
    {
        $family = Family::findOrFail($id);
        return View::make('family')->with(['family' => $family]);
    }

    public function calculateFamilyHappiness() 
    {
        // dd(Input::all());
        $user = Auth::user();

        $total = 0;
        $numberOfQuestions = count(Input::all()) -1;    // -1 is to get rid of the token

        for($i = 0; $i <10; $i ++) {
            $input = Input::get('answers_' . $i);
            $total += $input;
        }
        $score = $total;
        $user->score =$score;
        $user->save();
        return Redirect::action("HomeController@showFamily");
    }



    public function store()
    {
        $family = new Family();
        $family->name = strtolower(Input::get('name'));
        $family->save();

    }

    public function update($id)
    {
        if (Auth::user()->admin) {

            $family = Family::findOrFail($id);
            $family->name = strtolower(Input::get('name'));
            $family->mission_statement = Input::get('mission_statement');
            $family->save();

        } else {
            // Show error: 'Sorry but only admins can perform this action.'
        }
    }

    public function destroy($id)
    {
        if(Auth::user()->isAdmin) {

    // #### THIS WILL DESTROY YOUR FAMILY!! ####
            $family = Family::findOrFail($id);
            $family->delete();

         //    return Redirect::action('HomeController@index');
        }
    }
}

<?php

class FamilyController extends BaseController {

    public function show($id)
    {
        try {
            $family = Family::findOrFail($id);
            return View::make('famdash')->with(['family' => $family]);

        } catch(Exception $e) {
            App::abort(404);
        }

        $post = Family::find($id);
        return View::make('famdash')->with('family', $family);
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

            $family = Family::find($id);
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
            $family = Family::find($id);
            $family->delete();

            // return Redirect::action('HomeController@index');
        }
    }

}

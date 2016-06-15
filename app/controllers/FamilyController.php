<?php

class FamilyController extends BaseController {

    public function store()
    {
        $family = new Family();
        $family->name = strtolower(Input::get('name'));
        $family->save();

        // To Use ?
        //FamilyController::store();
    }

    // public function edit()
    // {

    // }

    public function update($id)
    {
        $family = Family::find($id);

        $family->name = strtolower(Input::get('name'));
        $family->mission_statement = Input::get('mission_statement');
        $family->save();
    }

    public function destroy()
    {

    }

}

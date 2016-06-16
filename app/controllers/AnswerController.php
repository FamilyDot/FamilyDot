<?php

class AnswerController extends BaseController {

    public function store()
    {
        $validator = new AnswersValidator();
        $validator->validate(Input::all());

        $user = Auth::user();
        Answer::createAnswer(Input::all(), $user);

        Session::flash('successMessage', 'Thanks for your answer.');
        return Redirect::back();
    }

    public function update($id)
    {

        $answer = Answer::findOrFail($id);
        $answer->answer = Input::get('answer');
        $answer->save();
    }

    public function destroy($id)
    {
    // #### THIS WILL DESTROY YOUR answer!! ####
        $answer = Answer::findOrFail($id);
        $answer->delete();

        return Redirect::back();
    }

}

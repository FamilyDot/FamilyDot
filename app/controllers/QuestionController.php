<?php

class QuestionController extends BaseController
{
    public function store()
    {
        $validator = new QuestionsValidator();
        $validator->validate(Input::all());

        $user = Auth::user();

        Question::createQuestion(Input::all(), $user);

        Session::flash('successMessage', 'Sending question through space and time to you family!');
        return Redirect::back();
    }

    public function update($id)
    {
        $validator = new QuestionsValidator();
        $validator->validate(Input::all());

        $question = Question::find($id);
        $question->question = Input::get('question');

        if ($validator->fails()) {
            return Redirect::back();
            Session::flash('errorMessage', 'Could not update question');  //this line may have to be deleted
        } else{
            $question->save();
            return Redirect::action('UsersController@show');
        }
    }


    public function destroy($id)
    {
        $question = Question::find($id);
        $question->destroy();

        return Redirect::action('UsersController@show');
    }
}

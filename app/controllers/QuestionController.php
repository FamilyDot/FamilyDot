<?php

class QuestionController extends BaseController
{
    public function store()
    {
        $user = Auth::user();
        $family_id = $user->family_id;

        $question = new Question();
        $question->question = Input::get('question');
        $question->family_id = $family_id;
        $question->user_id = $user->id;
        $question->save();

        return Redirect::action('UsersController@show');

    }

    public function update($id)
    {
        $question = Question::find($id);
        $question->question = Input::get('question');
        $question->save();

        return Redirect::action('UsersController@show');
    }

    public function destroy($id)
    {
        $question = Question::find($id);
        $question->destroy();

        return Redirect::action('UsersController@show');
    }
}

<?php

class QuestionController extends BaseController
{
    public function store()
    {
        $validator = new QuestionsValidator();
        $validator->validate(Input::all());


        $user = Auth::user();
        $family_id = $user->family_id;

        $question = new Question();
        $question->question = Input::get('question');
        $question->family_id = $family_id;
        $question->user_id = $user->id;
        
        if ($validator->fails()) {
            return Redirect::back();    
        } else{
            $question->save();
            return Redirect::action('UsersController@show');
        }
    }

    public function update($id)
    {
        $validator = new QuestionsValidator();
        $validator->validate(Input::all());

        $question = Question::find($id);
        $question->question = Input::get('question');
        
        if ($validator->fails()) {
            return Redirect::back();    
        } else{
            $question->save();
            return Redirect::action('UsersController@show');
        }
    }

        return Redirect::action('UsersController@show');
    }

    public function destroy($id)
    {
        $question = Question::find($id);
        $question->destroy();

        return Redirect::action('UsersController@show');
    }
}

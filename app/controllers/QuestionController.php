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
            Session::flash('errorMessage', 'Could not save question');  //this line may have to be deleted
        } else{
            $question->save();
            return Redirect::action('UsersController@show');
            Session::flash('successMessage', 'Question Saved!');
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

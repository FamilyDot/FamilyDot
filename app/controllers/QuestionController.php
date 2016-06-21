<?php

class QuestionController extends BaseController
{
    public function store()
    {
        $validator = new QuestionsValidator();
        $validator->validate(Input::all());

        $user = Auth::user();

        Question::createQuestion(Input::all(), $user);

        Session::flash('successMessage', 'Sending question through space and time to your family!');
        return Redirect::back();
    }

    public function update($id)
    {
        $questionRules = array(
            'question' => 'required|max:1000'
        );

        $validator = Validator::make(Input::all(), $questionRules);

        $response = [];

        if ($validator->fails()) {

            $response['errors'] = $validator->errors();
            $response['success'] = false;
            $statusCode = 422;
        } else {
            $question = Question::find($id);
            $question->question = Input::get('question');
            $question->save();
            $response['success'] = true;
            $statusCode = 200;
        }

        return Response::json($response, $statusCode);
    }


    public function destroy()
    {
        $id = Input::get('question_id');
        $question = Question::find($id);
        $question->delete();

        return Redirect::action('UsersController@show', Auth::id());
    }
}

<?php

class Question extends BaseModel
{
    protected $table = 'questions';

    public static $rules = array(
        'body' => 'required|max:3000'
    );

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function family()
    {
        return $this->belongsTo('Family');
    }

    public function answers()
    {
        return $this->hasMany('Answer');
    }

    public static function createQuestion($attributes, $user)
    {

        $family_id = $user->family_id;

        $question = new Question();
        $question->question = Input::get('question');
        $question->family_id = $family_id;
        $question->user_id = $user->id;
        $question->save();

        return $question;
    }
}

<?php

class Answer extends BaseModel
  {
    protected $table = 'answers';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function question()
    {
        return $this->belongsTo('Question');
    }

    public static function createAnswer($attributes, $user)
    {
        $answer = new self();

        $answer->answer = $attributes['answer'];
        $answer->user_id = $user->id;
        $answer->question_id = $attributes['question_id']; // comes from hidden input ???
        $answer->save();

        return $answer;
    }
}

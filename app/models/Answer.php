<?php

class Answer extends BaseModel
{
  protected $table = 'answers';

  public static $rules = array(
    'body' => 'required|max:1000'
  );

  public function user()
  {
    return $this->belongsTo('User');
  }

  public function question()
  {
    return $this->belongsTo('Question');
  }
}

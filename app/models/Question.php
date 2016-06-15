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
}

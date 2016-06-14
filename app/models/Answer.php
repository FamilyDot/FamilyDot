<?php

class Answer extends BaseModel
{
  protected $table = 'answers';

  public static $rules = array(
    'body' => 'required|max:1000'
  );
}

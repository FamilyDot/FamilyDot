<?php

class Question extends BaseModel
{
  protected $table = 'questions';

  public static $rules = array(
    'body' => 'required|max:3000'
  );
}

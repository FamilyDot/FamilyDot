<?php

class Family extends BaseModel
{
  protected $table = 'families';

  public static $rules = array(
    'name'              => 'required|max:100',
    'mission_statement' => 'required|max:1000'
  );
}

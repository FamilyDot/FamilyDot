<?php

class Post extends BaseModel
{
  protected $table = 'posts';

  public static $rules = array(
    'post'    => 'required|max:10000'
  );
}

<?php

class Post extends BaseModel
{
  protected $table = 'posts';

  public static $rules = array(
    'post'    => 'required|max:10000'
  );

  public function user()
  {
    return $this->belongsTo('User');
  }

  public function family()
  {
    return $this->belongsTo('Family');
  }


// ############  IN THE CASE THAT WE ADD COMMENTS ########
  // public function comments()
  // {
  //   return $this->hasMany('Comment');
  // }
}

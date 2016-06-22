<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

  	use UserTrait, RemindableTrait;

  	/**
  	 * The database table used by the model.
  	 *
  	 * @var string
  	 */
  	protected $table = 'users';

  	/**
  	 * The attributes excluded from the model's JSON form.
  	 *
  	 * @var array
  	 */
  	protected $hidden = array('password', 'remember_token');

    public function family()
    {
        return $this->belongsTo('Family');
    }

    public static function signUp($attributes, $family)
    {
      $user = new User();

      $user->email = $attributes['email'];
      $user->password = $attributes['password'];
      $user->username = $attributes['username'];
      $user->birth_day = $attributes['birth_day'];
      $user->first_name = $attributes['first_name'];
      $user->last_name = $attributes['last_name'];
      $user->image_url = $attributes['https://trip101.com/assets/default_profile_pic-9c5d869a996318867438aa3ccf9a9607daee021047c1088645fbdfbbed0e2aec.jpg'];
      $user->family_id = $family->id;
      $user->save();

      return $user;
    }
    public static $rules = array(

      'username' => 'required|max:100',
        'email' => 'required|max:1000',
        'image_url' => 'required|max:1000',
        'password' => 'required|max:25'

      );

}

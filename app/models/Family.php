<?php

class Family extends BaseModel
{
    protected $table = 'families';

    public static $rules = array(
        'name'              => 'required|max:100',
        'mission_statement' => 'required|max:1000',
    );

    public function users()
    {
        return $this->hasMany('User');
    }

    public function questions()
    {

        return $this->hasMany('Question');
    }

    public function posts()
    {
        return $this->hasMany('Post');
    }

    public static function findOrCreateWithName($familyName)
    {
      $family = Family::where('name', "=", $familyName)->first();

      if ($family == null) {
        $family = new Family();
        $family->name = $familyName;
        $family->save();
      }

      return $family;
    }

    public static function makeTwitterUrlwithUserNames($user)
    {
       $arrayOfallFamilyMembers = $user->family->users;
       $twitter_url = '"https://twitter.com/search?q=from%3A';
       $indexedArray = [];
       // will78006
       //%20OR%20
       //from%3A
       //snarky_tulip"
       //data-widget-id="745653492044312576"

       foreach($arrayOfallFamilyMembers as $key=>$user) {
            if ($user['twitter_username']) {
                $indexedArray[] = trim($user['twitter_username']);
            }
            // if ($indexedArray) {
            //     return $indexedArray;
            // }
        }
        foreach($indexedArray as $index=>$twitter_username) {
            if ($index == (count($indexedArray) - 1)) {
                $twitter_url .= $twitter_username . '"';
            } else {
                $twitter_url .= $twitter_username . '%2BOR%2Bfrom%3A';
            }
        }
       $twitter_url .= ' data-widget-id="745653492044312576"';

       $twitter_element = "<a class='twitter-timeline'  href=" . $twitter_url . ">Tweets about from your family!</a>";

       return $twitter_element;
    } //https://twitter.com/search?q=from%3Awill78006%20OR%20from%3A%20OR%20from%3Adata-widget-id="745653492044312576"
}

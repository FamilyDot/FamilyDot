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
       $indexedArray = [];
       $twitter_elements = [];
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

            $twitter_elements[] = "<a class='twitter-timeline'  href='https://twitter.com/search?q=from%3A" . $twitter_username . "' data-screen-name='" . $twitter_username . "' data-widget-id='745653492044312576' height='300'>Tweets about from your family!</a>";
        }


       return $twitter_elements;
    } //https://twitter.com/search?q=from%3Awill78006%20OR%20from%3A%20OR%20from%3Adata-widget-id="745653492044312576"
    
    public static function calculateFamilyHappiness()
    {
        $user = Auth::user();

        $userFamilyId = $user->family_id;

        // selct * from users where family_id = $familyId this is similar to that query 
        $users = User::where('family_id', '=', $userFamilyId)->get();

        $totalScores = 0;
        $userCount = $users->count();

        foreach ($users as $user) {
            if($user->score == 0){
                $userCount --;
            }else {
                $totalScores += $user->score;
            }
        }
        $avgScore = $totalScores / $userCount;
        return $avgScore;
    }








}

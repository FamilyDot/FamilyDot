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
}

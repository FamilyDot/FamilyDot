<?php

class FamiliesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('families')->delete();

        $family = new Family();
        $family->name = 'Codeup';
        $family->mission_statement = 'The Codeup team hopes to make their corner of the world a little better by solving a big, meaningful problem for the community and the country — one person at a time.';
        $family->save();
    }

}

<?php

class FamiliesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('families')->delete();

        //User::create(array('email' => 'foo@bar.com'));
    }

}

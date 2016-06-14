<?php

class AnswersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('answers')->delete();

        //User::create(array('email' => 'foo@bar.com'));
    }

}

<?php

class QuestionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('questions')->delete();

        //User::create(array('email' => 'foo@bar.com'));
    }

}

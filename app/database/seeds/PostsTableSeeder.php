<?php

class PostsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('posts')->delete();

        //User::create(array('email' => 'foo@bar.com'));
    }

}

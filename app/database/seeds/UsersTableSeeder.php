<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        $user->email = 'will78006@yahoo.com';
        $user->password = 'password';
        $user->username = 'will78006';
        $user->first_name = 'Will';
        $user->last_name = 'Campbell';
        $user->birth_day = '1981-02-18';
        $user->family_id = 1;
        $user->image_url = '/uploads/will.jpg';
        $user->isAdmin = 1;
        $user->twitter_username = 'will78006';
        $user->save();

        $user = new User();
        $user->email = 'mauro@example.com';
        $user->password = 'password';
        $user->username = 'mauro';
        $user->first_name = 'Mauro';
        $user->last_name = 'Cabrales';
        $user->birth_day = '1980-04-21';
        $user->family_id = 1;
        $user->image_url = '/uploads/mauro.jpg';
        $user->save();

        $user = new User();
        $user->email = 'michah@site.com';
        $user->password = 'password';
        $user->username = 'Mikeuh';
        $user->first_name = 'Micah';
        $user->last_name = 'Smith';
        $user->birth_day = '1983-01-13';
        $user->family_id = 1;
        $user->image_url = '/uploads/micah.jpg';
        $user->twitter_username = 'Ninzaburoz';
        $user->save();

    }
}

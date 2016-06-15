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
        $user->isAdmin = 1;
        $user->save();

        $user = new User();
        $user->email = 'example@example.com';
        $user->password = 'password';
        $user->username = 'gwen333';
        $user->first_name = 'Gwen';
        $user->last_name = 'Campbell';
        $user->birth_day = '2002-09-17';
        $user->family_id = 1;
        $user->save();

        $user = new User();
        $user->email = 'holly@site.com';
        $user->password = 'password';
        $user->username = 'holly777';
        $user->first_name = 'Holly';
        $user->last_name = 'Campbell';
        $user->birth_day = '1983-01-13';
        $user->family_id = 1;
        $user->save();

    }
}

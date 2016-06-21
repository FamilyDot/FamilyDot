<?php

class PostsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('posts')->delete();

        $post = new Post();
        $post->body = 'Will got a promotion this week!';
        $post->user_id = '1';
        $post->family_id = '1';
        $post->img_url = 'http://www.adweek.com/socialtimes/wp-content/uploads/sites/2/2016/02/DeadpoolLogo.jpg';
        $post->save();

        $post = new Post();
        $post->body = 'Dad has to go to a PTA meeting tonight';
        $post->user_id = '2';
        $post->family_id = '1';
        $post->img_url = 'http://orig04.deviantart.net/45f3/f/2013/159/1/a/percy_jackson_by_aireenscolor-d5fuvqv.jpg';
        $post->save();

        $post = new Post();
        $post->body = 'Penny has her band competition this weekend, everyone please remember to clear your schedules for Saturday!';
        $post->user_id = '1';
        $post->family_id = '1';
        $post->img_url = 'http://www.adweek.com/socialtimes/wp-content/uploads/sites/2/2016/02/DeadpoolLogo.jpg';
        $post->save();

        $post = new Post();
        $post->body = 'Mom is going to work a little late tomorrow, the family may need to order pizza for dinner.';
        $post->user_id = '1';
        $post->family_id = '1';
        $post->img_url = 'http://www.adweek.com/socialtimes/wp-content/uploads/sites/2/2016/02/DeadpoolLogo.jpg';
        $post->save();

        $post = new Post();
        $post->body = 'Everyone, don\'t forget the family reunion is next month!';
        $post->user_id = '1';
        $post->family_id = '1';
        $post->img_url = 'http://www.adweek.com/socialtimes/wp-content/uploads/sites/2/2016/02/DeadpoolLogo.jpg';
        $post->save();

        $post = new Post();
        $post->body = 'Stacey\'s doctor appointment is Wednesday at 8:30.';
        $post->user_id = '1';
        $post->family_id = '1';
        $post->img_url = 'http://www.adweek.com/socialtimes/wp-content/uploads/sites/2/2016/02/DeadpoolLogo.jpg';
        $post->save();


        $post = new Post();
        $post->body = 'School supply shopping is coming up soon, everyone make your lists.';
        $post->user_id = '1';
        $post->family_id = '1';
        $post->img_url = 'http://www.adweek.com/socialtimes/wp-content/uploads/sites/2/2016/02/DeadpoolLogo.jpg';
        $post->save();

    }

}

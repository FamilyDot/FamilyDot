<?php

class PostsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('posts')->delete();

        $post = new Post();
        $post->body = 'Everytime I watch Deadpool, half way through I get the urge to pull out my comics and start reading.
            Also eat a chimichanga...or two, does anyone else agree?';
        $post->user_id = '1';
        $post->family_id = '1';
        $post->img_url = 'http://www.adweek.com/socialtimes/wp-content/uploads/sites/2/2016/02/DeadpoolLogo.jpg';
        $post->save();

        $post = new Post();
        $post->body = 'Twelve-year-old Percy Jackson is on the most dangerous quest of his life. With the help of a satyr and a daughter of Athena, Percy must journey across the United States to catch a thief who has stolen the original weapon of mass destruction — Zeus’ master bolt... How does this summary rate?';
        $post->user_id = '2';
        $post->family_id = '1';
        $post->img_url = 'http://orig04.deviantart.net/45f3/f/2013/159/1/a/percy_jackson_by_aireenscolor-d5fuvqv.jpg';
        $post->save();

        $post = new Post();
        $post->body = 'Does everyone agree that tacos are pretty great';
        $post->user_id = '1';
        $post->family_id = '1';
        $post->img_url = 'http://www.adweek.com/socialtimes/wp-content/uploads/sites/2/2016/02/DeadpoolLogo.jpg';
        $post->save();

        $post = new Post();
        $post->body = 'For our summer vacation does everyone agree that disneyworld is a good place to go?';
        $post->user_id = '1';
        $post->family_id = '1';
        $post->img_url = 'http://www.adweek.com/socialtimes/wp-content/uploads/sites/2/2016/02/DeadpoolLogo.jpg';
        $post->save();

        $post = new Post();
        $post->body = 'Today i bought new shoes with some of our extra money for the week, I know we didn\'t agree that it was in our family budget, but don\'t you agree the flatter my legs?';
        $post->user_id = '1';
        $post->family_id = '1';
        $post->img_url = 'http://www.adweek.com/socialtimes/wp-content/uploads/sites/2/2016/02/DeadpoolLogo.jpg';
        $post->save();

        $post = new Post();
        $post->body = 'this is a post, how would you rate this?';
        $post->user_id = '1';
        $post->family_id = '1';
        $post->img_url = 'http://www.adweek.com/socialtimes/wp-content/uploads/sites/2/2016/02/DeadpoolLogo.jpg';
        $post->save();


        $post = new Post();
        $post->body = 'this post is post number 7 and i think you should rate this';
        $post->user_id = '1';
        $post->family_id = '1';
        $post->img_url = 'http://www.adweek.com/socialtimes/wp-content/uploads/sites/2/2016/02/DeadpoolLogo.jpg';
        $post->save();


        $post = new Post();
        $post->body = 'How would you rate the ending of gilligans island';
        $post->user_id = '1';
        $post->family_id = '1';
        $post->img_url = 'http://www.adweek.com/socialtimes/wp-content/uploads/sites/2/2016/02/DeadpoolLogo.jpg';
        $post->save();


        $post = new Post();
        $post->body = 'How would you rate the ending of ER';
        $post->user_id = '1';
        $post->family_id = '1';
        $post->img_url = 'http://www.adweek.com/socialtimes/wp-content/uploads/sites/2/2016/02/DeadpoolLogo.jpg';
        $post->save();


        $post = new Post();
        $post->body = 'How would you rate the ending of Saved?';
        $post->user_id = '1';
        $post->family_id = '1';
        $post->img_url = 'http://www.adweek.com/socialtimes/wp-content/uploads/sites/2/2016/02/DeadpoolLogo.jpg';
        $post->save();
    }

}

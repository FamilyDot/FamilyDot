<?php

class AnswersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('answers')->delete();

        $answer = new Answer();
        $answer->answer = 'I really liked going to the movies!';
        $answer->user_id = 1;
        $answer->question_id = 1;
        $answer->save();

        $answer = new Answer();
        $answer->answer = 'Playing board games like Exploding Kittens.';
        $answer->user_id = 2;
        $answer->question_id = 1;
        $answer->save();

        $answer = new Answer();
        $answer->answer = 'Eating lunch at the park was great.';
        $answer->user_id = 3;
        $answer->question_id = 1;
        $answer->save();

        $answer = new Answer();
        $answer->answer = 'I wish I would have studied for my math test more.';
        $answer->user_id = 2;
        $answer->question_id = 2;
        $answer->save();
    }

}

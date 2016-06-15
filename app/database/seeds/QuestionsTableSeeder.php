<?php

class QuestionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('questions')->delete();

        $question = new Question();
        $question->question = 'What activity this month did you enjoy the most?';
        $question->user_id = 1;
        $question->family_id = 1;
        $question->save();
        $question = new Question();
        $question->question = 'What was one thing that really impresses you?';
        $question->user_id = 2;
        $question->family_id = 1;
        $question->save();

        $question = new Question();
        $question->question = 'If you could change one thing about last week, what would it be?';
        $question->user_id = 2;
        $question->family_id = 1;
        $question->save();

        $question = new Question();
        $question->question = 'What one thing about your family makes you the happiest?';
        $question->user_id = 1;
        $question->family_id = 1;
        $question->save();

        $question = new Question();
        $question->question = 'What was something someone said that made you sad?';
        $question->user_id = 1;
        $question->family_id = 1;
        $question->save();

        $question = new Question();
        $question->question = 'If you could go anywhere with your family, where would go?';
        $question->user_id = 1;
        $question->family_id = 1;
        $question->save();


    }

}

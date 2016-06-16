<?php

class QuestionsValidator
{
    public function validate($attributes)
    {
        $questionRules = array(
            'question'      => 'required|max:1000'
        );

        $validator = Validator::make($attributes, $questionRules);

        if ($validator->fails()) {
            throw new ValidationFailure('Failed to post question', $validator);
        }
    }
}

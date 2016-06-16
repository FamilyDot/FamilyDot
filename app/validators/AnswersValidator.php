<?php

class AnswerValidator
{
    public function validate($attributes)
    {
        $signUpRules = array(
            'answer' => 'required|max:1000',
        );

        $validator = Validator::make($attributes, $signUpRules);

        if ($validator->fails()) {
            throw new ValidationFailure('Cannot be blank. Must be less than 1000 characters', $validator);
        }
    }
}

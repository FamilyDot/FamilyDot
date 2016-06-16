<?php

class LoginValidator
{
    public function validate($attributes)
    {
        $loginRules = array()
            'email'             => 'required|email|users',
            'password'          => 'required|min:8',

        );

        $validator = Validator::make($attributes, $loginRules);

        if ($validator->fails()) {
            throw new ValidationFailure('Failed to login, confirm your input is correct.', $validator);
        }
    }
}

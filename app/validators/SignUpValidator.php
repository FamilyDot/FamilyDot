<?php

class SignUpValidator
{
    public function validate($attributes)
    {
        $signUpRules = array(
            'username'          => 'required|max:1000|unique:users',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|min:8',
            'passwordValidate'  => 'required|same:password',
            'name'              => 'required',
        );

        $validator = Validator::make($attributes, $signUpRules);

        if ($validator->fails()) {
            throw new ValidationFailure('Failed to create account.', $validator);
        }
    }
}

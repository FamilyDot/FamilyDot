<?php

class PostsValidator
{
    public function validate($attributes)
    {
        $postsRules = array(
            'body'   => 'required|max:3000'
            
        );
        $validator = Validator::make($attributes, $postsRules);

        if ($validator->fails()) {
            throw new ValidationFailure('Could not post', $validator);
        }
    }
}


// 
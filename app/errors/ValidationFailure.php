<?php

class ValidationFailure extends Exception
{
    public $validator;

    public function __construct($message, $validator)
    {
        $this->message = $message;
        $this->validator = $validator;
    }
}

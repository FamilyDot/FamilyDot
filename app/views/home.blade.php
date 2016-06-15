@extends('layouts.master')

@section('topscript')
    <link rel="stylesheet"  href="/../css/home.css">
@stop


@section('content')
<div id="row">
    <div>    
        <div id="logo">
            <img src="/uploads/FamilyDot-logo (1).png">
        </div>

    <div id="form">
                {{-- the action is temporary need to go back and redo --}}
            {{ Form::open(array('action' =>('HomeController@doSignup'), 'method' => 'POST')) }}
                <div class="row">
                    <div class="col-md-4  col-md-offset-4">
                        {{ Form::label('username', 'Username', array('class' => 'sr-only')) }}
                        {{ Form::text('username',  null,  array('class' =>'form-control', 'placeholder'=> 'Username','id'=>'username-field')) }}

                        {{ Form::label('email', 'Email', array('class' => 'sr-only')) }}
                        {{ Form::text('email',  null,  array('class' =>'form-control', 'placeholder'=> 'Email','id'=>'email-field')) }}

                        {{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
                        {{ Form::text('password',  null,  array('class' =>'form-control', 'placeholder'=> 'Password','id'=>'password-field')) }}

                        {{ Form::label('passwordValidate', 'PasswordValidate', array('class' => 'sr-only')) }}
                        {{ Form::text('passwordValidate',  null,  array('class' =>'form-control', 'placeholder'=> 'Confirm Password','id'=>'passwordValidate-field')) }}

                        {{ Form::label('birth_day', 'birth_day', array('class' => 'sr-only')) }}    
                        {{ Form::text('birth_day',  null,  array('class' =>'form-control', 'placeholder'=> 'Birthday', 'id'=>'birth_day-field')) }}

                        {{ Form::label('first_name', 'first_name', array('class' => 'sr-only')) }}
                        {{ Form::text('first_name',  null,  array('class' =>'form-control', 'placeholder'=> 'First Name','id'=>'first_name-field')) }}

                        {{ Form::label('last_name', 'last_name', array('class' => 'sr-only')) }}
                        {{ Form::text('last_name',  null,  array('class' =>'form-control', 'placeholder'=> 'Last Name','id'=>'last_name-field')) }}

                        {{ Form::label('name', 'name', array('class' => 'sr-only')) }}
                        {{ Form::text('name',  null,  array('class' =>'form-control', 'placeholder'=> 'Family Name','id'=>'name-field')) }}


                        <div id="button">
                            <input class="btn btn-primary" id="btn_sub"  type="submit" value="Signup">
                                <br><a href="login">Have an account?</a>
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop


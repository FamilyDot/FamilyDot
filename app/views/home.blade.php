@extends('layouts.master')

@section('topscript')
    <link rel="stylesheet"  href="/../css/home.css">
@stop


@section('content')
<!-- need to relook at this -->
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <img src="/img/Final-contestant.png">
        </div>
        <div class="col-md-3">
            {{ Form::open(array('action' =>('HomeController@doSignup'), 'method' => 'POST')) }}

                    {{ $errors->first('username', '<span class="help-block">:message</span>') }}
                {{ Form::label('username', 'Username', array('class' => 'sr-only')) }}
                {{ Form::text('username',  null,  array('class' =>'form-control', 'placeholder'=> 'Username (Required)','id'=>'username-field')) }}
                    {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                {{ Form::label('email', 'Email', array('class' => 'sr-only')) }}
                {{ Form::text('email',  null,  array('class' =>'form-control', 'placeholder'=> 'Email (Required)','id'=>'email-field')) }}
                    {{ $errors->first('password', '<span class="help-block">:message</span>') }}
                {{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
                {{ Form::password('password',  array('class' =>'form-control', 'placeholder'=> 'Password (Required)','id'=>'password-field')) }}
                    {{ $errors->first('confirm password', '<span class="help-block">:message</span>') }}
                {{ Form::label('passwordValidate', 'PasswordValidate', array('class' => 'sr-only')) }}
                {{ Form::password('passwordValidate',  array('class' =>'form-control', 'placeholder'=> 'Confirm Password (Required)','id'=>'passwordValidate-field')) }}
                
                {{ Form::label('birth_day', 'birth_day', array('class' => 'sr-only')) }}    
                {{ Form::text('birth_day',  null,  array('class' =>'form-control', 'placeholder'=> 'Birthday', 'id'=>'birth_day-field')) }}

                {{ Form::label('first_name', 'first_name', array('class' => 'sr-only')) }}
                {{ Form::text('first_name',  null,  array('class' =>'form-control', 'placeholder'=> 'First Name','id'=>'first_name-field')) }}

                {{ Form::label('last_name', 'last_name', array('class' => 'sr-only')) }}
                {{ Form::text('last_name',  null,  array('class' =>'form-control', 'placeholder'=> 'Last Name','id'=>'last_name-field')) }}
                    {{ $errors->first('Family Name', '<span class="help-block">:message</span>') }}
                {{ Form::label('name', 'name', array('class' => 'sr-only')) }}
                {{ Form::text('name',  null,  array('class' =>'form-control', 'placeholder'=> 'Family Name (Required)','id'=>'name-field')) }}
            
                    <input class="btn btn-primary" id="btn_sub"  type="submit" value="Signup">
                    <p><a href="{{{action('HomeController@showLogin')}}}">Have an account?</a></p>
                   
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop


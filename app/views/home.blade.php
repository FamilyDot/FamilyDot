@extends('layouts.master')

@section('topscript')
    <link rel="stylesheet"  href="/../css/home.css">
@stop


@section('content')
<!-- need to relook at this -->
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <img src="/img/yourfamily.png">
        </div>

        <div class="col-md-5" id="form-back">
            <div class="row">
                {{ Form::open(array('action' =>('HomeController@doSignup'), 'method' => 'POST')) }}
                    <div class="form-group">
                        {{ $errors->first('username', '<span class="help-block">:message</span>') }}
                        {{ Form::text('username',  null,  array('class' =>'form-control', 'placeholder'=> 'Username (Required)','id'=>'username-field')) }}
                    </div>
            </div>
            <div class="row">
                <div class="form-group">
                    {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                    {{ Form::text('email',  null,  array('class' =>'form-control', 'placeholder'=> 'Email (Required)','id'=>'email-field')) }}
                </div>
            </div>
            <div class="row">
                <div class="form-group"> <!-- relook at -->
                    <div class="col-md-6">
                        {{ $errors->first('password', '<span class="help-block">:message</span>') }}
                        {{ Form::password('password',  array('class' =>'form-control password-field','placeholder'=> 'Password (Required)','id'=>'password-field')) }}
                    </div> 
                    <div class=" form-group col-md-6">
                        {{ $errors->first('confirm password', '<span class="help-block">:message</span>') }}
                        {{ Form::password('passwordValidate',  array('class' =>'form-control password-field','placeholder'=> 'Confirm Password (Required)','id'=>'passwordValidate-field')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" form-group">  
                    <div class="col-md-6">
                        {{ Form::text('first_name',  null,  array('class' =>'form-control','placeholder'=> 'First Name','id'=>'first_name-field')) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::text('last_name',  null,  array('class' =>'form-control','placeholder'=> 'Last Name','id'=>'last_name-field')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    {{ Form::text('birth_day',  null,  array('class' =>'form-control', 'placeholder'=> 'Birthday (YYYY-MM-DD)', 'id'=>'birth_day-field')) }}
                </div>
            </div>
 
            <div class="row">
                <div class="form-group">
                        {{ $errors->first('Family Name', '<span class="help-block">:message</span>') }}
                    {{ Form::text('name',  null,  array('class' =>'form-control', 'placeholder'=> 'Family Name (Required)','id'=>'name-field')) }}
                </div>
            </div>
    
            <div class="row">
                    <input class="btn btn-primary" id="btn_sub"  type="submit" value="Signup">
                    <p><a href="{{{action('HomeController@showLogin')}}}">Have an account?</a></p>
            </div>
            {{ Form::close() }}     
        </div>
     
    </div> <!-- end row -->
</div>
@stop


@extends('layouts.master')

@section('topscript')
    <link rel="stylesheet"  href="/../css/home.css">
@stop


@section('content')
<div id="row">
    <div>    
        <div id="logo">
            <img src="/uploads/familyDot.png">
        </div>

    <div id="form">
                {{-- the action is temporary need to go back and redo --}}
            {{ Form::open(array('action' =>('HomeController@showLogin'), 'method' => 'POST')) }}
                <div class="row">
                    <div class="col-md-4  col-md-offset-4">
                        {{ Form::label('username', 'Username', array('class' => 'sr-only')) }}
                        {{ Form::text('username',  null,  array('class' =>'form-control', 'placeholder'=> 'Username','id'=>'username-field')) }}

                        {{ Form::label('email', 'Email', array('class' => 'sr-only')) }}
                        {{ Form::text('email',  null,  array('class' =>'form-control', 'placeholder'=> 'Email','id'=>'email-field')) }}

                        {{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
                        {{ Form::text('password',  null,  array('class' =>'form-control', 'placeholder'=> 'Password','id'=>'password-field')) }}

                        {{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
                        {{ Form::text('password',  null,  array('class' =>'form-control', 'placeholder'=> 'Confirm Password','id'=>'password-field')) }}

                        {{ Form::label('dateOfBirth', 'DateOfBirth', array('class' => 'sr-only')) }}    
                        {{ Form::text('dateOfBirth',  null,  array('class' =>'form-control', 'placeholder'=> 'Date Of Birth', 'id'=>'dob-field')) }}

                        {{ Form::label('family', 'Family', array('class' => 'sr-only')) }}
                        {{ Form::text('family',  null,  array('class' =>'form-control', 'placeholder'=> 'Family Name','id'=>'family-field')) }}
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


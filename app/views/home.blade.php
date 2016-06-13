@extends('layouts.master')

@section('topscript')
    <link rel="stylesheet"  href="">
@stop


@section('content')

<div id="form">
    <div id="link">
        <h1><a href="login">Have an account?</h1>
    </div>

    <div id="signup-form">
            {{-- the action is temporary need to go back and redo --}}
        {{ Form::open(array('action' =>('HomeController@showLogin'), 'method' => 'POST')) }}


        <div id="signup">
            {{ Form::text('username',  null,  array('class' =>'form-control', 'placeholder'=> 'Username')) }}
            {{ Form::text('email',  null,  array('class' =>'form-control', 'placeholder'=> 'Email')) }}
            {{ Form::text('password',  null,  array('class' =>'form-control', 'placeholder'=> 'Password')) }}
            {{ Form::text('password',  null,  array('class' =>'form-control', 'placeholder'=> 'Confirm Password')) }}
            {{ Form::text('dateOfBirth',  null,  array('class' =>'form-control', 'placeholder'=> 'Date Of Birth')) }}
            {{ Form::text('family',  null,  array('class' =>'form-control', 'placeholder'=> 'Family Name')) }}
        </div>
                <div id="button">
                    <input class="btn btn-success" id="btn_sub"  type="submit" value="Signup">
                </div>
        {{ Form::close() }}
    </div>
</div>
@stop


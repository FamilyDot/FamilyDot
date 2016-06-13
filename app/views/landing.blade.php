@extends('layouts.master')

@section('topscript')

<link rel="stylesheet"  href="">
@stop


@section('abovecontainer')
<div id="Login">
<h1>Login</h1>
</div>


{{ Form::open(array('action' =>('HomeController@showLanding'), 'method' => 'POST')) }}


<div id="signup">
    {{ Form::text('username',  null,  array('class' =>'form-control', 'placeholder'=> 'Username')) }}
    {{ Form::text('email',  null,  array('class' =>'form-control', 'placeholder'=> 'Email')) }}
    {{ Form::text('password',  null,  array('class' =>'form-control', 'placeholder'=> 'Password')) }}
    {{ Form::text('password',  null,  array('class' =>'form-control', 'placeholder'=> 'Confirm Password')) }}
    {{ Form::text('dateOfBirth',  null,  array('class' =>'form-control', 'placeholder'=> 'Date Of Birth')) }}
    {{ Form::text('family',  null,  array('class' =>'form-control', 'placeholder'=> 'Family Name')) }}
</div>
        <div id="button">
            <input class="btn btn-success" id="btn_sub"  type="submit" value="Login">
        </div>
{{ Form::close() }}
@stop



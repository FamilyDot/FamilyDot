@extends('layouts.master')

@section('topscript')
    <link rel="stylesheet"  href="">
@stop


@section('content')

<div id="form">
        <h1><a href="home">Don't have an account?</h1>

    <div id="login-form">
        {{ Form::open(array('action' =>('HomeController@showHome'), 'method' => 'POST')) }}


        <div id="signup">
            {{ Form::text('username',  null,  array('class' =>'form-control', 'placeholder'=> 'Username')) }}
            {{ Form::text('email',  null,  array('class' =>'form-control', 'placeholder'=> 'Email')) }}
            {{ Form::text('password',  null,  array('class' =>'form-control', 'placeholder'=> 'Password')) }}
        </div>
                <div id="button">
                    <input class="btn btn-success" id="btn_sub"  type="submit" value="Login">
                </div>
        {{ Form::close() }}
    </div>
</div>
@stop
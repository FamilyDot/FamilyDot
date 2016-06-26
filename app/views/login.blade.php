@extends('layouts.master')

@section('topscript')
    <link rel="stylesheet"  href="/../css/home.css">
@stop


@section('content')
<!-- need to relook at this -->
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <img class="logo" src="/img/Your Family-logo.png">
        </div>

        <div class="col-md-5 col-md-offset-1" id="form-back-login">
            <div class="row">
            {{ Form::open(array('action' =>('HomeController@doLogin'), 'method' => 'POST')) }}
                <div class="form-group">
                    {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                    {{ Form::text('email',  null,  array('class' =>'form-control', 'placeholder'=> 'Email','id'=>'email-field')) }}

                </div>
            </div>
                <div class="row">
                    <div class="form-group">
                        {{ $errors->first('password', '<span class="help-block">:message</span>') }}
                        {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password', 'id'=>'pass-field')) }}
                    </div>
                </div>
                <div class="row">
                    <input class="btn btn-primary my-btn" id="btn_sub"  type="submit" value="Login">
                    <p class="account-link"><a href="{{{action('HomeController@doSignup')}}}">Don't have an account?</a></p>
                </div>
            {{ Form::close() }}
            </div>
        </div> <!-- this closes the row above the form -->
    </div>
</div>

@stop

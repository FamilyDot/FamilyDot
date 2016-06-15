@extends('layouts.master')

@section('topscript')
    <link rel="stylesheet"  href="/../css/login.css">
@stop


@section('content')
<div id="row">
    <div>    
        <div id="logo">
            <img src="/uploads/house-7.png">
        </div>
    <div id="form"> 
       <!-- the action is temporary need to go back and redo -->
            {{ Form::open(array('action' =>('HomeController@doLogin'), 'method' => 'POST')) }}
                    <div class="col-md-4 col-md-offset-4">
                            {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                        {{ Form::label('email', 'Email', array('class' => 'sr-only')) }}
                        {{ Form::text('email',  null,  array('class' =>'form-control', 'placeholder'=> 'Email','id'=>'email-field')) }}
                    </div>
                

               
                    <div class="col-md-4 col-md-offset-4">
                            {{ $errors->first('password', '<span class="help-block">:message</span>') }}
                        {{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
                        {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password', 'id'=>'pass-field')) }}
                        <div id="button">
                            <input class="btn btn-primary my-btn" id="btn_sub"  type="submit" value="Login">
                                <br><a href="{{{action('HomeController@doSignup')}}}">Don't have an account?</a>
                        </div>
                    </div>
                    
        {{ Form::close() }}
    </div>
    </div>
</div>

@stop
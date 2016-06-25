@extends('layouts.master')

@section('topscript')
    <link rel="stylesheet"  href="/../css/login.css">
@stop


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7" id="picture">
            <img src="/img/yourfamily.png">
        </div>
        <div class="col-md-3" id="form"> 
       <!-- the action is temporary need to go back and redo -->
            {{ Form::open(array('action' =>('HomeController@doLogin'), 'method' => 'POST')) }}
          
                            {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                        {{ Form::label('email', 'Email', array('class' => 'sr-only')) }}
                        {{ Form::text('email',  null,  array('class' =>'form-control', 'placeholder'=> 'Email','id'=>'email-field')) }}
               
       
                            {{ $errors->first('password', '<span class="help-block">:message</span>') }}
                        {{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
                        {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password', 'id'=>'pass-field')) }}
                    
                            <input class="btn btn-primary my-btn" id="btn_sub"  type="submit" value="Login">
                                <p><a href="{{{action('HomeController@doSignup')}}}">Don't have an account?</a></p>
                    
            {{ Form::close() }}
        </div>
    </div>
</div>

@stop
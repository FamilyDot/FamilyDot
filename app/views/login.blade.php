@extends('layouts.master')

@section('topscript')
    <link rel="stylesheet"  href="">
@stop


@section('content')

<div id="form">
    <div id="login-form">
            {{-- the action is temporary need to go back and redo --}}
        {{ Form::open(array('action' =>('HomeController@showHome'), 'method' => 'POST')) }}
            <div class="row">
                <div class="col-md-4  col-md-offset-4">
                    {{ Form::text('username',  null,  array('class' =>'form-control', 'placeholder'=> 'Username')) }}
                    {{ Form::text('email',  null,  array('class' =>'form-control', 'placeholder'=> 'Email')) }}
                    {{ Form::text('password',  null,  array('class' =>'form-control', 'placeholder'=> 'Password')) }}
                    <div id="button">
                        <input class="btn btn-success" id="btn_sub"  type="submit" value="Login">
                            <br><a href="home">Don't have an account?</a>
                    </div>
                </div>
            </div>
        {{ Form::close() }}

    </div>
</div>
@stop
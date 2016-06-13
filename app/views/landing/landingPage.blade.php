@extends('layouts.master')

@section('topscript')

<link rel="stylesheet"  href="">
@stop


@section('abovecontainer')
<div id="Login">
<h1>Login</h1>
</div>

<div id="signup">
    {{ Form::text('email',  null,  array('class' =>'form-control', 'placeholder'=> 'Email')) }}
    {{ Form::text('password',  null,  array('class' =>'form-control', 'placeholder'=> 'Password')) }}
</div>
@stop



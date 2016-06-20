@extends('layouts.master')


<link rel="stylesheet" type="text/css" href="/../css/user.css">

@section('title')
Edit page
@stop
@section('content')

{{ Form::open(array('action' =>['UsersController@update', $user->id], 'method' => 'PUT')) }}

<div class="container">
<h1 style="padding-top:60px; color:black;">Edit your profile!</h1>

    <button style="float:right;">Delete Profile</button>

    

    <div>{{ Form::label('username', 'User name') }}
    {{ Form::text('username', $user->username) }}</div>
    <br>
    <div>{{ Form::label('email', 'E-mail') }}
    {{ Form::text('email', $user->email) }}</div>
    <br>
    <div>{{ Form::label('image_url', 'Picture') }}
    {{ Form::text('image_url', $user->image_url) }}</div>
    <br>
    <div>{{ Form::label('password', 'Password') }}
    {{ Form::text('password', $user->password) }}</div>
    <br>
    {{ Form::submit('submit') }}
    {{ Form::close() }}

</div>


@stop

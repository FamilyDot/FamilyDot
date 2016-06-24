@extends('layouts.master')

<link rel="stylesheet" type="text/css" href="/../css/editpage.css">
<!-- <link rel="stylesheet" type="text/css" href="/../css/user.css"> -->


@section('content')
<div class="form-horizontal container-fluid" id="bigDiv">
<h1 id="heading">Edit your profile!</h1>
{{ Form::open(array('action' =>['UsersController@update', $user->id], 'method' => 'PUT')) }}

        
    <div class="form-group labels">
        {{ Form::label('username', 'User name') }}
    </div>
    <div class="form-group">
        {{ Form::text('username', $user->username, ['class' => 'textBox']) }}
    </div>
    <div class="form-group labels">
        {{ Form::label('email', 'E-mail') }}
    </div>
    <div class="form-group">
        {{ Form::text('email', $user->email, ['class' => 'textBox']) }}
    </div>
    <div class="form-group labels">
        {{ Form::label('image_url', 'Picture') }}
        <h4>Link a picture to your profile. Paste a URL here!</h4>
    </div>
    <div class="form-group">
        {{ Form::text('image_url', "", ['class' => 'textBox']) }}
    </div>
    <div class="form-group labels">
        {{ Form::label('twitter_username', 'Twitter User name') }}
    </div>
        <div class="form-group">
        {{ Form::text('twitter_username', $user->twitter_username, ['class' => 'textBox']) }}
    </div>
    <div class="form-group labels">
        {{ Form::label('password', 'Password') }}
    </div>
    <div class="form-group">
        {{ Form::password('password', '', ['class' => 'password']) }}
    </div>
    <div class="form-group labels">
        {{ Form::label('password', 'Re-type Password') }}
    </div>
    <div class="form-group">
        {{ Form::password('password', '', ['class' => 'password']) }}
    </div>
    <div class="row col-xs-4">
        {{ Form::submit('submit', ['class' => 'btn-lg btn-success']) }}
{{ Form::close() }}
    </div>
    <div>
        {{ Form::open(['method' => 'DELETE', 'action' => ['UsersController@destroy', $user->id], 'onsubmit' => 'return ConfirmDelete()']) }}
        {{ Form::submit('Delete Profile', ['class' => 'btn-lg btn-danger']) }}
    </div>
{{ Form::close() }}

</div>

<script>
  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete you account?");
  if (x)
    return true;
  else
    return false;
  }
</script>
@stop

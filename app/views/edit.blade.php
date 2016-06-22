@extends('layouts.master')


<link rel="stylesheet" type="text/css" href="/../css/user.css">

@section('title')
Edit page
@stop
@section('content')

{{ Form::open(array('action' =>['UsersController@update', $user->id], 'method' => 'PUT')) }}

<div class="form-horizontal container" style="padding-left:320px;">
<h1 style="padding-top:60px; color:black;">Edit your profile!</h1>    
    <div>
        {{ Form::label('username', 'User name') }}
        {{ Form::text('username', $user->username) }}
    </div>
    <br>
    <div>
        {{ Form::label('email', 'E-mail') }}
        {{ Form::text('email', $user->email) }}
    </div>
    <br>
    <div>
        {{ Form::label('image_url', 'Picture') }}
        {{ Form::text('image_url', $user->image_url) }}
    </div>
    <br>
    <div>
        {{ Form::label('password', 'Password') }}
        {{ Form::text('password', '') }}
        <div>
        <br>
        {{ Form::label('password', 'Re-type Password') }}
        {{ Form::text('password', '') }}
        </div>
    </div>
    <br>
    <div class="row">
        {{ Form::submit('submit', ['class' => 'btn btn-success']) }}
        </div>    
        {{ Form::close() }}
    <br>
    <div class='row'>
        {{ Form::open(['method' => 'DELETE', 'action' => ['UsersController@destroy', $user->id], 'onsubmit' => 'return ConfirmDelete()']) }}
        {{ Form::submit('Delete Profile', ['class' => 'btn btn-danger']) }}
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

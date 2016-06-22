@extends('layouts.master')


<link rel="stylesheet" type="text/css" href="/../css/user.css">
<style type="text/css">

.textBox    {

    height:40px;
    width:400px;
}

input#password   {

    height:40px;
    width:400px;
}
    
.labels {

    font-size:30px;
}

#bigDiv  {
    padding-left:320px;
} 

#heading    {

    padding-top:60px; 
    color:gray;
}
</style>
@section('title')
Edit page
@stop
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
    </div>
    <div class="form-group">
        {{ Form::text('image_url', $user->image_url, ['class' => 'textBox']) }}
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
    <div>
        {{ Form::submit('submit', ['class' => 'btn-lg btn-success']) }}
    </div>
{{ Form::close() }}

<br>
   
    <div>
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

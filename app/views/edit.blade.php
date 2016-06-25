@extends('layouts.master')


@section('topscript')
    <link rel="stylesheet" type="text/css" href="/../css/editpage.css">
@stop

@section('content')
<h1>Edit Profile</h1>
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            {{ Form::open(array('action' =>('UsersController@update'), $user->id, 'method' => 'PUT')) }}
               
                <div class="form-group">
                {{ Form::label('username', 'Username') }}
                {{ Form::text('username',  null,  array('class'=>'form-control','id'=>'username-field')) }}
                </div>

                <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email',  null,  array('class'=>'form-control','id'=>'email-field')) }}
                </div>

                <div class="form-group">
                {{ Form::label('image_url', 'Picture: Link a picture to your profile') }}
                {{ Form::text('image_url',  null, array('class'=>'form-control','placeholder'=>'Paste a URL here!','id'=>'image-field')) }}
                </div>

                <div class="form-group">
                {{ Form::label('twitter_username', 'Twitter User name') }}
                {{ Form::text('twitter_username', $user->twitter_username, array('class'=>'form-control','id' =>'twitter-field')) }}
                </div>

                <div class="form-group">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password',  array('class'=>'form-control','placeholder'=>'Password (8 Characters Required)','id'=>'password-field')) }}
                </div>

                <div class="form-group">
                {{ $errors->first('confirm password', '<span class="help-block">:message</span>') }}
                {{ Form::label('password', 'Confirm Password') }}
                {{ Form::password('passwordValidate',  array('class'=>'form-control','placeholder'=>'Confirm Password (8 Characters Required)','id'=>'passwordValidate-field')) }}
                </div>

                <input class="btn btn-primary" id="btn_sub"  type="submit" value="Submit">
                    {{ Form::open(['method' => 'DELETE', 'action' => ['UsersController@destroy', $user->id], 'onsubmit' => 'return ConfirmDelete()']) }}
                    {{ Form::submit('Delete Profile', ['class' => 'btn-sm btn-danger']) }}
                    {{ Form::close() }}
            {{ Form::close() }}
            </div>
        </div> <!-- row closed-->
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

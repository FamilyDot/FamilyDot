@extends('layouts.master')


@section('topscript')
    <link rel="stylesheet" type="text/css" href="/../css/editpage.css">
@stop

@section('content')
<h1>Edit Profile</h1>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {{ Form::open(array('action' =>['UsersController@update', $user->id], 'method' => 'PUT')) }} 
                
                <div class="row">   
                    <div class="form-group">
                        {{ Form::label('username', 'Username') }}
                        {{ Form::text('username', $user->username, ['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="row"> 
                    <div class="form-group">
                        {{ Form::label('email', 'E-mail') }}
                        {{ Form::text('email', $user->email, ['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="row"> 
                    <div class="form-group">
                        {{ Form::label('image_url', 'Picture: Link a picture to your profile') }}
                        {{ Form::text('image_url', "", ['class'=>'form-control','placeholder'=>'Paste a URL here!']) }}
                    </div>
                </div>
                <div class="row"> 
                    <div class="form-group">
                        {{ Form::label('twitter_username', 'Twitter User name') }}
                        {{ Form::text('twitter_username', $user->twitter_username, ['class'=>'form-control']) }}
                    </div>
                </div>

                <div class="row"> 
                    <div class="form-group">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password',  array('class'=>'form-control','placeholder'=>'Password (8 Characters Required)','id'=>'password-field')) }}
                    </div>
                </div>
                <div class="row"> 
                    <div class="form-group">
                        {{ Form::label('password', 'Confirm Password') }}
                        {{ Form::password('passwordValidate',  array('class'=>'form-control','placeholder'=>'Confirm Password (8 Characters Required)','id'=>'passwordValidate-field')) }}
                    </div>
                </div>
                <div id="sub_btn">
                    {{ Form::submit('submit', ['class' => 'btn btn-primary']) }}
                </div>

            {{ Form::close() }}

            <div id="del_btn">
                {{ Form::open(['method' => 'DELETE', 'action' => ['UsersController@destroy', $user->id], 'onsubmit' => 'return ConfirmDelete()']) }}
                {{ Form::submit('Delete Profile', ['class' => 'btn btn-danger']) }}
            </div>
                {{ Form::close() }}
        </div>
    </div>
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
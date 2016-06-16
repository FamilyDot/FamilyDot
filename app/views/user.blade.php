@extends('layouts.master')
@section('topscript')
    <link rel="stylesheet"  href="/../css/login.css">
    <link rel="stylesheet" type="text/css" href="/../css/user.css">
@stop

<body>
@section('content')
<div class="row">
    <div class="col-md-9 col-md-offset-1">
    <h1>{{{ $family->mission_statement }}}</h1>
    </div>
<br>
</div>
    <div class='container' >
        <div id= 'pic_row' class= 'row'>
            <div class="col-md-3">

                  <img src="uploads/kid1.jpg" alt="kid" id='user_pic'>
                    <div>
                        <h3>{{{ $user->username }}}</h3>
                        <h4>{{{ $user->first_name }}}</h4>
                        <h4>{{{ $user->last_name }}}</h4>
                        <h4>{{{ $user->email }}}</h4>
                        <h4>{{{ $user->birth_day }}}</h4>
                    </div>
             </div>
                <div class='col-md-8'>
                    <h1 class= 'container'>Question</h1>
                        @foreach($user->family->questions as $question)
                        <h2><a href="{{{ action('UsersController@show', $question->family_id)}}}">{{{ $question->question }}}</a></h2>
                    @endforeach
                </div>
        </div>
    </div>
</div><!-- <-container div-->
@stop

@section('bottomscript')
<script type="text/javascript">
$(document).ready(function(){
    "use strict";

    var $question_id = null;

    $(".question").click(function(event) {
      $question_id = event.target.id;
    });
})
</script>
@stop
</body>









</body>

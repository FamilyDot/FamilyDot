@extends('layouts.master')
@section('topscript')
    <link rel="stylesheet"  href="/../css/login.css">
    <link rel="stylesheet" type="text/css" href="/../css/user.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
@stop
<body>
@section('content')
<div class="row">
    <div class="col-md-9 col-md-offset-1">
        <h1>{{{ $user->family->mission_statement }}}</h1>
    </div>

    <br>
</div>

    <div class='container' >
        <div id= 'pic_row' class= 'row'>
            <div class="col-md-3">
                <img src="/uploads/kid1.jpg" alt="kid" id='user_pic'>
                <div id="user_info">
                    <h3>{{{ $user->username }}}</h3>
                    <h4>{{{ $user->first_name }}}</h4>
                    <h4>{{{ $user->last_name }}}</h4>
                    <h4>{{{ $user->email }}}</h4>
                    <h4>{{{ $user->birth_day }}}</h4>
                </div>
            </div> <!-- end of user colomn -->

            <div class='col-md-8 questions'>
                <h1>Questions</h1>
                @foreach($user->family->questions as $question)
                    <div class="question" id="{{{ $question->id }}}">
                        <div class="w3-card-4" id="card" data-toggle="modal" data-target="#myModal">
                            <h4>{{{User::find($question->user_id)->username}}}</h4>
                            <h2>{{{ $question->question }}}</h2><hr>

                            @foreach($question->answers as $answer)
                                <p>{{{ User::find($answer->user_id)->username }}}</p>
                                <h4>{{{ $answer->answer }}}</h4>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel"></h4>
                            </div>

                            <div class="modal-body">
                                <form>
                                    <textarea rows="4" cols="50"></textarea>
                                    <input id="question_input" type="hidden" value="" >
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end of modal -->

            </div><!-- end of questions column -->
        </div> <!-- end pic-row -->

    </div> <!-- end container -->
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


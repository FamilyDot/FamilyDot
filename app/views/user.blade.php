@extends('layouts.master')
@section('topscript')
    {{-- <link rel="stylesheet"  href="/../css/login.css"> --}}
    <link rel="stylesheet" type="text/css" href="/../css/user.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
@stop
<body>
@section('content')

<div class="center-text" id="title">
    <h1>{{{ $user->family->mission_statement }}}</h1><br>
</div>
<div class='container' >

    <br>
    <div id= 'pic_row' class= 'row'>
        <div class="col-md-3">
            <div class="user_info">
                <img src="/uploads/kid1.jpg" alt="kid" id='user_pic'>
                <h3>{{{ $user->username }}}</h3>
                <h4>{{{ $user->first_name }}}</h4>
                <h4>{{{ $user->last_name }}}</h4>
                <h4>{{{ $user->email }}}</h4>
                <h4>{{{ $user->birth_day }}}</h4>
            </div>
        </div> <!-- end of user colomn -->

        <div class='col-md-6 questions'>
            @foreach($user->family->questions as $question)
                <div class="question" id="{{{ $question->id }}}" data-toggle="modal" data-target="#AnswerModal">
                    <div class="w3-card-4" id="card">
                        <h2><span class="username username-question">{{{User::find($question->user_id)->username}}}</span> {{{ $question->question }}}</h2><hr>

                        @foreach($question->answers as $answer)
                            <h4><span class="username ">{{{ User::find($answer->user_id)->username }}}</span> {{{ $answer->answer }}}</h4>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <!-- Modal -->
            <div class="modal fade" id="AnswerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>

                        <div class="modal-body">
                            <form method="POST" action="{{{ action('AnswerController@store') }}}">
                                {{ Form::token() }}
                                <textarea rows="4" cols="50" name="answer"></textarea>
                                <input id="question_input" name="question_id" type="hidden" value="">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
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

        $(".question").click(function() {
            $question_id = $(this).attr('id');

            $("#question_input").val($question_id);
        });
    })
</script>
@stop

</body>


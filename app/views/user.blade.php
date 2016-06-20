@extends('layouts.master')
@section('topscript')
    {{-- <link rel="stylesheet"  href="/../css/login.css"> --}}
    <link rel="stylesheet" type="text/css" href="/../css/user.css">
    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

@stop
<body>
@section('content')

<div class='container'>
<div class="center-text" id="title">
    <h1>{{{ $user->family->mission_statement }}}</h1><br>
</div>
    <br>
    <div id= 'pic_row' class= 'row'>
        <div class="col-md-3">
            <div class="user_info well">
                <div class="user-image">
                    <img class="img-rounded img-responsive profile_image" src="{{{ $user->image_url }}}">
                </div>
                <!-- <h3>@{{{ $user->username }}}</h3> -->
                <h4> Hi, {{{ $user->first_name }}} {{{ $user->last_name }}}!</h4>
                {{-- <h4>{{{ $user->email }}}</h4> --}}
            </div>
        </div> <!-- end of user column -->

        <div class='col-md-6 questions'>
            @foreach($user->family->questions as $question)
                <div class="question" id="{{{ $question->id }}}">
                    <div class="w3-card-4" id="card">
                        <img class="img-circle" src="{{{User::find($question->user_id)->image_url}}}">
                        <h2 data-userid="user_{{{ $question->user_id }}}"><span>{{{ $question->question }}}</span></h2>
                        <p class="answer-model-link" id="answer_to_question_{{{ $question->id }}}"><a  data-toggle="modal" data-target="#AnswerModal">Answer</a></p>
                        @if (!empty($question->answers[0]))
                            <div><br><hr></div>
                        @endif

                        @foreach($question->answers as $answer)
                            <div class="answers">
                                <p><span class="username">{{{ User::find($answer->user_id)->first_name }}}    </span>{{{ $answer->answer }}}</p>
                            </div>
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
                            <h4 class="modal-title" id="myModalLabel">Answer Question</h4>
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

        $('#fullname').click(function(){
            var name = $(this).text();
            $(this).html('');
            $('<input></input>')
                .attr({
                    'type': 'text',
                    'name': 'fname',
                    'id': 'txt_fullname',
                    'size': '30',
                    'value': name
                })
                .appendTo('#fullname');
            $('#txt_fullname').focus();
        });

        $(document).on('blur','#txt_fullname', function(){
            var name = $(this).val();
            $.ajax({
              type: 'post',
              url: 'change-name.xhr?name=' + name,
              success: function(){
                $('#fullname').text(name);
              }
            });
        });
    })
</script>
@stop

</body>


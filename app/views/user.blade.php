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
                <h4> Hi, @{{{ $user->username }}}!</h4>
                <h4>Family: {{{ ucwords($user->family->name)}}}</h4>
            </div>
        </div> <!-- end of user column -->

        <div class='col-md-6 questions'>
            {{ Form::token() }}
            @foreach($questions as $question)
                <div class="question" id="">
                    <div class="w3-card-4" id="card">
                        <div class="row">
                            <div class="col-md-2">
                                <img class="img-circle" src="{{{User::find($question->user_id)->image_url}}}">
                            </div>
                            <div class="col-md-9">
                                <h2 class="users_question" id="user-{{{ $question->user_id }}}" data-question-id="{{{ $question->id }}}" data-auth="{{{ ($question->user_id == Auth::user()->id) }}}"><span>{{{ $question->question }}}</span></h2>
                            </div>
                            <div class="col-md-1" >
                                <button type="button" class="fa fa-trash-o fa-2x hidden delete" aria-hidden="true" id="delete" data-toggle="modal" data-target="#modal-delete"></button>
                            </div>
                        </div>

                        <p class="answer-model-link" id="answer_to_question_{{{ $question->id }}}"><a class="answer-link" id="{{{ $question->id }}}" data-toggle="modal" data-target="#AnswerModal">Answer</a></p>
                        @if (!empty($question->answers[0]))
                            <div><br><hr></div>
                        @endif
                        <?php $answers = DB::table('answers')->where('question_id', $question->id)->orderBy('created_at', 'desc')->get(); ?>
                        @foreach($answers as $answer)
                            <div class="answers">
                                <p><span class="username">{{{ User::find($answer->user_id)->first_name }}}    </span>{{{ $answer->answer }}}</p>
                             {{--    @if ($answer->user_id == Auth::user()->id)
                                    <i class="edit-answer" id="{{{ $answer->id }}}">
                                @endif --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div> <!-- end of questions -->

        <div class="col-md-3 social-feed">
            <button class="btn btn-lg btn-primary" id="add-twitter" data-toggle="modal" data-target="#modal-twitter">Add your Twitter feed</button>

            {{ $twitter_element }}

            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

        </div>



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
                            <form class="" method="POST" action="{{{ action('AnswerController@store') }}}">
                                {{ Form::token() }}
                                <textarea rows="2" cols="30" name="answer"></textarea>
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
        <!-- MODAL -->
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-delete">
          <div class="modal-dialog modal-sm">

            <div class="modal-content">
              <div class="container">
                <h4 class="modal-title" id="myModalLabel">Delete Forever?</h4>

                <!-- FORM -->
                <form method="POST" action="{{{ action('QuestionController@destroy') }}}">
                  {{ Form::token() }}
                  <div class="form-group">
                    <input type="hidden" value="DELETE" name="_method">
                    <input type="hidden" value="" name="question_id" id="question-id-input">
                    <button class="btn btn-primary" data-dismiss="modal">No Way!</button>
                    <button class="btn btn-danger" type="submit">DELETE</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div> <!-- end modal -->

        <!-- Twitter add name MODAL -->
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-twitter">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="container">
                <h4 class="modal-title" id="myModalLabel">Enter Your Twitter Username</h4>

                <!-- FORM -->
                <form method="POST" action="{{{ action('UsersController@addTwitter') }}}">
                  {{ Form::token() }}

                  <div class="form-group">
                    <label for="twitter_username">Twitter @</label>
                    <input name="twitter_username">
                    <button class="btn btn-sm btn-primary" type="submit">Submit Name</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div> <!-- end twitter modal -->

@stop

@section('bottomscript')
    <script src="/../js/userspage_edit_question.js" type="text/javascript"></script>
@stop

</body>


@extends('layouts.master')
@section('topscript')
    <!-- font awsome cdn -->
    <script src="https://use.fontawesome.com/f5fdf2e9f7.js"></script>
    <!-- css file -->
    <link rel="stylesheet"  href="/../css/famdash.css">
@stop

@section('content')
<div class='container'>
    <div class='rel'>
        <div class="center-text" id="title">
            <h1>{{{ $user->family->mission_statement }}}</h1><br>
        </div>
    </div>

<!-- chart -->
<div class="dumb">
    <div id="chart" class="col-md-6 col-md-offset-3">
        @if ($avg != 0)
          <div id="chartContainer"></div>
          <input type="hidden" id="happiness-avg" value="{{{ $avg }}}"></input>
        @endif
    </div>

<!-- these are posts -->
    <div class="col-md-4 col-md-offset-1">
    <h1 id= "family_posts">Family Wall</h1>
        @foreach($user->family->posts as $post)
            <div class="w3-card-4" id="card">
                <p class="multi-posts">{{{ $post->body }}}</p>
            </div>
        @endforeach
        <div id="button">
            <input class="btn btn-primary" id="sub_posts"  type="submit" value="Add to Posts">
        </div>
    </div>


<!-- this is the survey -->
    <div class="col-md-4 col-md-offset-1">
    <h1 id="family_survey">Family Survey</h1>

        {{Form::open(array('method' => 'PUT', 'action' => array('FamilyController@updateUserScore', $user->id)))}}

            @foreach($survey as $key => $question)
                <div class="w3-card-4" id="card">
                    <p id="quest">{{{ $question }}}</p>

                   <div id="rad_btns">
                        <input type="radio" name="answers_{{{ $key }}}" class="number" value="1"> 1
                        <input type="radio" name="answers_{{{ $key }}}" class="number" value="2"> 2
                        <input type="radio" name="answers_{{{ $key }}}" class="number" value="3"> 3
                        <input type="radio" name="answers_{{{ $key }}}" class="number" value="4"> 4
                        <input type="radio" name="answers_{{{ $key }}}" class="number" value="5"> 5
                        <input type="radio" name="answers_{{{ $key }}}" class="number" value="6"> 6
                        <input type="radio" name="answers_{{{ $key }}}" class="number" value="7"> 7
                        <input type="radio" name="answers_{{{ $key }}}" class="number" value="8"> 8
                        <input type="radio" name="answers_{{{ $key }}}" class="number" value="9"> 9
                        <input type="radio" name="answers_{{{ $key }}}" class="number" value="10"> 10
                    </div>
                </div>
            @endforeach
                <div id="button">
                    <input class="btn btn-primary" id="sub_survey"  type="submit" value="Submit Survey">
                </div>
        {{Form::close()}}
</div><!-- this closes the dumb class-->
<!--modal for posts -->
    <div class="modal fade allModal" id="myModalPost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Create a Post?</h4>
                </div>
                <div>

                        {{Form::open(array('method' => 'POST', 'action' => 'PostController@store'))}}
                            <div class="modal-body">
                                <textarea class='form-control' name="body" rows="4" id="text" cols="50" autofocus></textarea>
                            </div>
                            <!-- "modal-footer"> -->
                            <div id="save_changes" class="modal-footer">
                                <button  type="submit" class="btn btn-info">Save changes</button>
                            </div>
                        {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for survey -->
    <div class="modal fade allModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                        <!-- <h4 class="modal-title" id="myModalLabel">Congrats here's your family's health chart...</h4> -->
                        <!-- this is our chart yall -->
                </div>
            </div>
        </div>
    </div>








<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<!-- chart cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>
<!-- js for family view and chart js-->
<script src="/js/family.js" type="text/javascript"></script>


@stop

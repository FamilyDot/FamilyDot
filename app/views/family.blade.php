@extends('layouts.master')
@section('topscript')
    <!-- font awsome cdn -->
    <script src="https://use.fontawesome.com/f5fdf2e9f7.js"></script>
    <link rel="stylesheet"  href="/../css/famdash.css">
@stop
@section('content')
<div class="row">
    <div id="ms">
        <h1 style='padding-top:70px;' class="container">{{{ $user->family->mission_statement }}}</h1>
        <hr>
    </div>




    <div class="col-md-4 col-md-offset-1">
    <h1 id= "family_posts">Family Posts</h1> 
        @foreach($user->family->posts as $post)
            <div class="w3-card-4" id="card">
                <p>{{{ $post->body }}}</p>
            </div>
        @endforeach
        <input class="btn btn-primary" id="sub_posts"  type="submit" value="Add to Posts">
    </div>



    <div class="col-md-4 col-md-offset-1">
    <h1 id="family_survey">Family Survey</h1>
        <form>
            @foreach($user->family->posts as $post)
                <!-- Button trigger modal -->
  <!--               <div class="w3-card-4" id="card">
                    <p>{{{ $post->survey_question }}}</p>
                    <div id="rad_btns">
                        <input type="radio" name="answers[{{$post->id}}]" class="number" value="1"> 1 
                        <input type="radio" name="answers[{{$post->id}}]" class="number" value="2"> 2 
                        <input type="radio" name="answers[{{$post->id}}]" class="number" value="3"> 3 
                        <input type="radio" name="answers[{{$post->id}}]" class="number" value="4"> 4 
                        <input type="radio" name="answers[{{$post->id}}]" class="number" value="5"> 5 
                        <input type="radio" name="answers[{{$post->id}}]" class="number" value="6"> 6 
                        <input type="radio" name="answers[{{$post->id}}]" class="number" value="7"> 7 
                        <input type="radio" name="answers[{{$post->id}}]" class="number" value="8"> 8 
                        <input type="radio" name="answers[{{$post->id}}]" class="number" value="9"> 9 
                        <input type="radio" name="answers[{{$post->id}}]" class="number" value="10"> 10 
                    </div>
                </div> -->
            @endforeach
        </form>
        <input class="btn btn-primary" id="sub_survey"  type="submit" value="Submit Survey">
    </div> 

                <!-- modal for posts -->
            <div class="modal fade" id="myModalPost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                                <h4 class="modal-title" id="myModalLabel">Create a Post?</h4>
                        </div>

                        {{Form::open(array('method' => 'POST', 'action' => 'PostController@store'))}}                      
                        <div class="modal-body">
                            <textarea name="body" rows="4" cols="50">
                            </textarea>
                        </div>
                        <!-- "modal-footer"> -->
                        <div id="save_changes" class="modal-footer">
                            <button  type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        {{Form::close()}}
                      

                    </div>
                </div>
            </div>





                <!-- Modal for survey -->
<!--             <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                                <h4 class="modal-title" id="myModalLabel">Congrats your family's average health is <span id="health"></span>!</h4>
                        </div>
                    </div>
                </div>
            </div>
    </div> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="/js/family.js" type="text/javascript"></script>
@stop


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
        <h1 id="familyPosts" class= 'container'>This weeks survey</h1>
            <div class="col-md-4">
                <form>
                @foreach($user->family->posts as $post)
                    <!-- Button trigger modal -->
                    <div class="w3-card-4" id="card">
                        <p>{{{ $post->body }}}</p>
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
                    </div>
                @endforeach
                </form>
                <input class="btn btn-primary" id="sub_survey"  type="submit" value="Submit Survey">
            </div> 







            <div class="col-md-6">
                <form>
                @foreach($user->family->posts as $post)
                    <!-- Button trigger modal -->
                    <div class="w3-card-4" id="card">
                        <p>{{{ $post->body }}}</p>
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
                    </div>
                @endforeach
                </form>
                <input class="btn btn-primary" id="sub_survey"  type="submit" value="Submit Survey">
            </div>    
                 <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                                <h4 class="modal-title" id="myModalLabel">Congrats your family's average health is <span id="health"></span>!</h4>
                        </div>
                        <!-- <div class="modal-footer"> -->
                            <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <!-- </div> -->
                    </div>
                </div>
            </div>
            <!-- </div> -->
        <!-- </div>
    </div> -->
</div>

    <!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="/js/family.js"></script>
@stop
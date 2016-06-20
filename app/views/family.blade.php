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
            <div class="col-md-6 col-md-offset-3">
                <form>
                @foreach($user->family->posts as $post)
                    <!-- Button trigger modal -->
                    <div class="w3-card-4" id="card">
                        <img class="img-circle" src="{{{User::find($post->user_id)->image_url}}}">
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
                <input class="btn btn-primary" id="btn_sub"  type="submit" value="Submit Survey">
            </div>    
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
                            <textarea rows="4" cols="50">
                            </textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        <!-- </div>
    </div> -->
</div>
<script type="text/javascript" src="/js/family.js"></script>

@stop
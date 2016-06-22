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
        @foreach( $user->family->users as $user)
            <p>{{{ $user['username'] }}}</p>
        @endforeach
        <hr>
    </div>



<!-- these are posts -->
    <div class="col-md-4 col-md-offset-1">
    <h1 id= "family_posts">Family Posts</h1>
        @foreach($user->family->posts as $post)
            <div class="w3-card-4" id="card">
                <p>{{{ $post->body }}}</p>
            </div>
        @endforeach
        <input class="btn btn-primary" id="sub_posts"  type="submit" value="Add to Posts">
    </div>


<!-- this is the survey -->
    <div class="col-md-4 col-md-offset-1">
    <h1 id="family_survey">Family Survey</h1>

        {{Form::open(array('method' => 'POST', 'action' => 'FamilyController@calculateFamilyHappiness'))}}
            @foreach($survey as $key => $question)
                <div class="w3-card-4" id="card">
                    <p>{{{ $question }}}</p>
                
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

       <!--  <form> -->
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
                </div>
            @endforeach
        <input class="btn btn-primary" id="sub_survey"  type="submit" value="Submit Survey">

        {{Form::close()}}
    </div> 

    </div>



<!-modal for posts -->
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
                                <textarea name="body" rows="4" id="text" cols="50">
                                </textarea>
                            </div>
                            <!-- "modal-footer"> -->
                            <div id="save_changes" class="modal-footer">
                                <button  type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        {{Form::close()}}


                {{Form::open(array('method' => 'POST', 'action' => 'PostController@store'))}}                      
                    <div class="modal-body">
                        <textarea name="body" rows="4" id="text" cols="50">
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




    <!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- chart cdn from chartjs -->
<script href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- this is the js file -->
<script src="/js/family.js" type="text/javascript"></script>

<div>
    
<canvas id="myChart" width="400" height="400"></canvas>

<script type="text/javascript">  
// Any of the following formats may be used
var ctx = document.getElementById("myChart");


var data = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "My First dataset",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [65, 59, 80, 81, 56, 55, 40],
        }
    ]
};

var myLineChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: options
});

</script>

</div>






@stop


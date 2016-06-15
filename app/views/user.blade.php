@extends('layouts.master')
@section('topscript')
    <link rel="stylesheet"  href="/../css/login.css">
    <link rel="stylesheet" type="text/css" href="/../css/user.css">
@stop

<body>
@section('content')
<div class="row">
    <div class="col-md-9 col-md-offset-3">
    <h1>This is the family mission statement!!!</h1>
    </div>
<br>
</div>
    <div class='container' >
        <div id= 'pic_row' class= 'row'>
            <div class="col-md-3">
                                   
                  <img src="uploads/kid1.jpg" alt="kid" id='user_pic'>
                   <div>
                   <h3>{{{ $questions->user_id }}}</h3>
                    <h4>other info </h4>
                    <h4>other info </h4>
                    <h4>other info </h4>
                    <h4>other info </h4>
                    </div>

                    
                </div>
                <div class='col-md-8'>
                    <h1 class= 'container'>Question</h1>
                        @foreach($questions as $question)
                        <h2><a href="{{{ action('HomeController@showUser', $question->family_id)}}}">{{{ $question->question }}}</a></h2>
                    @endforeach
                </div>    
        </div>
    </div>  
</div><!-- <-container div--> 
@stop
</body>









</body>
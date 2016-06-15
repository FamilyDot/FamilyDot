@extends('layouts.master')

@section('topscript')
    <!-- font awsome cdn -->
    <script src="https://use.fontawesome.com/f5fdf2e9f7.js"></script>
    <link rel="stylesheet"  href="/../css/famdash.css">
@stop

@section('content')
<div id="mission">
    <div id="row">
        <h1>Family mission statement goes here</h1>
        <div class="col-md-offset-9">
        <!-- maybe edit link should only be visible to an admin so that noone else can change it? or do we want all to access? -->
            <a href="">An edit link</a>
        </div>
    </div>
</div>

  <!-- ideally we'll have to put a foreach in these cards -->
<div class="col-md-6 col-md-offset-3">
    <div class="card card-block">
        <div>
            <img src="/uploads/heart-logo-small.png">
            <!-- this is a generic placeholder for the image that will be posted later -->
                <i class="fa fa-smile-o" aria-hidden="true"></i>
                <h3 class="card-title">A post of an announcement</h3>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary my-btn">Go somewhere</a>            
                <i class="fa fa-trash" aria-hidden="true"></i>
        </div>
    </div>
</div>



<div class="col-md-6 col-md-offset-3">
    <div class="card card-block">
        <div>
            <img src="/uploads/heart-logo-small.png">
                <h3 class="card-title">A post of an announcement</h3>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>            
                <i class="fa fa-trash" aria-hidden="true"></i>
        </div>
    </div>
</div>

<div class="col-md-6 col-md-offset-3">
    <div class="card card-block">
        <div>
            <img src="/uploads/heart-logo-small.png">
                <h3 class="card-title">A post of an announcement</h3>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>            
                <i class="fa fa-trash" aria-hidden="true"></i>
        </div>
    </div>
</div>

<div class="col-md-6 col-md-offset-3">
    <div class="card card-block">
        <div>
            <img src="/uploads/heart-logo-small.png">
                <h3 class="card-title">A post of an announcement</h3>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>            
                <i class="fa fa-trash" aria-hidden="true"></i>
        </div>
    </div>
</div>
@stop
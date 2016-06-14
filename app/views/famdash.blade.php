@extends('layouts.master')

@section('topscript')
    <link rel="stylesheet"  href="/../css/famdash.css">
@stop

@section('content')
<div id="mission">
    <div id="row">
        <h1>With supporting text below as a natural lead-in to</h1>
        <div class="col-md-offset-9">
        <!-- maybe edit link should only be visible to an admin so that noone else can change it? or do we want all to access? -->
            <a href="">An edit link</a>
        </div>
    </div>
</div>





  <div class="col-md-6 col-md-offset-3">
    <div class="card card-block">
    <div>
        <img src="/uploads/heart-logo-small.png">
              <h3 class="card-title">A post of an announcement</h3>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary"></a>
    </div>
    </div>
  </div>



  <!-- ideally we'll have to put a foreach in these cards -->

  <div class="col-md-6 col-md-offset-3">
    <div class="card card-block">
      <h3 class="card-title">A post of an announcement</h3>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>



  <div class="col-md-6 col-md-offset-3">
    <div class="card card-block">
      <h3 class="card-title">A post of an announcement</h3>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>



  <div class="col-md-6 col-md-offset-3">
    <div class="card card-block">
      <h3 class="card-title">A post of an announcement</h3>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>




  <div class="col-md-6 col-md-offset-3">
    <div class="card card-block">
      <h3 class="card-title">A post of an announcement</h3>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

@stop
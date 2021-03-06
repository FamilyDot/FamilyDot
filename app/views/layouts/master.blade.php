<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Family App</title>
    <link rel="icon" href="/img/house_logo.png">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/../css/user.css">
    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Happy+Monkey' rel='stylesheet' type='text/css'>
    <style type="text/css">
    #modalButton, #myModalLabelAsk{
      text-align:center;
    }

    </style>

    @yield('topscript')
</head>
<body>
    @yield('upperbody')
    @yield('abovecontainer')


@if(Auth::check())
  <nav class="navbar navbar-default navbar-fixed-top" id="navbar">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?php $user = Auth::user() ?>
        @if(Request::url() == "http://familydot.dev/users/$user->id" || Request::url() == "http://yourfamilyapp.xyz/users/$user->id")
          <a href="/family">{{ HTML::image('img/your-family-logo-long.png', 'family dot logo', array('class' => 'familydot-logo')) }}</a>
        @else
          <a href="/users/{{{ $user->id }}}">{{ HTML::image('img/your-family-logo-long.png', 'family dot logo', array('class' => 'familydot-logo')) }}</a>
        @endif
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <!-- Button trigger modal -->

          <li class="dropdown">
            <a class="dropdown-toggle img-responsive img-rounded" style="padding-top:7px;" data-toggle="dropdown" role="button" aria-haspopup="true" ><img class="img-rounded" style="height:32px;width:32px;" src="{{{ Auth::user()->image_url }}}"></a>
            <ul class="dropdown-menu">
              <li><a href="/users/{{{Auth::id()}}}">Profile</a></li>
              <li><a href="/users/{{{Auth::id()}}}/edit">Edit Profile</a></li>
              <li><a href="/family" >Family Dashboard</li>

              <li role="separator" class="divider"></li>
              <li><a href="{{ action('HomeController@doLogout') }}">Logout</a></li>
            </ul>
          </li>

          @if(Request::url() == "http://familydot.dev/users/$user->id" || Request::url() == "http://yourfamilyapp.xyz/users/$user->id")
            <li>
              <button type="button" class="btn btn-xs " id='ask-button' data-toggle="modal" data-target="#askQuestion"><span class="ask-inner"><i class="fa fa-2x fa-comments-o" aria-hidden="false"></i> Ask</span></button>
            </li>
          @endif
        </ul>

        @if(Request::url() == "http://familydot.dev/family" || Request::url() == "http://yourfamilyapp.xyz/family")
            <form class="navbar-form navbar-right" role="search" method="GET" action="/search">
            {{ Form::token() }}
                <div class="form-group">
                  <input type="text" id="search-input" class="form-control" placeholder="Search Posts" name="search">
                </div>
                  <button id= 'navbutton' type="submit" class="btn btn-default">Submit</button>
            </form>
        @endif
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
@endif

<!-- Modal -->
<div class="modal fade allModal" id="askQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabelAsk">Ask a Question</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{{ action('QuestionController@store') }}}">
                    {{ Form::token() }}
                    <div class="form-group">
                        <textarea class="form-control" rows="4" cols="50" name="question"></textarea>
                    </div>
            </div>
                    <div style="text-align:center;" class="modal-footer">
                    <button id="modalButton" type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
        </div>
    </div>
</div>

{{--     @if (Session::has('successMessage'))
        <div class="alert alert-success">
            <p class="flow-text center-align" id="alert">{{{ Session::get('successMessage') }}}</p>
        </div>
    @endif --}}
    @if (Session::has('errorMessage'))
        <div class="text-center alert alert-danger alert-top-screen">{{{ Session::get('errorMessage') }}}</div>
    @endif
    @if(Session::has('successMessage'))
      <div class="text-center alert alert-success alert-top-screen">{{{Session::get('successMessage')}}}</div>
    @endif

    @yield('content')
</main>
    <!-- for if you dont want in the container -->
    @yield('body')
    <!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


  <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/8687895f96.js"></script>
<script type="text/javascript">
    $("#modalopener").click(function() {
    $(".modal-dialog").modal('hide');
   });
</script>

@yield('lowerbody')

@yield('bottomscript')


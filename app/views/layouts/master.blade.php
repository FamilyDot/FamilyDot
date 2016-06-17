<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="/uploads/FamilyDot-logo (1).png">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/../css/user.css">
    @yield('topscript')
</head>
<body>
    @yield('upperbody')
    @yield('abovecontainer')


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
    <a href="/"><img  id= 'familyDot' src="/img/Final-contestant-icon.png"></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <!-- Button trigger modal -->
        <li class="dropdown">
          @if(Auth::check())
          <a class="dropdown-toggle img-responsive" style="padding-top:7px;" data-toggle="dropdown" role="button" aria-haspopup="true" ><img style="height:40px;width:40px;" src="{{{ $user->image_url }}}"></a>
          <ul class="dropdown-menu">
            <li><a href="#">Edit Profile</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ action('HomeController@doLogout') }}">Logout</a></li>
          </ul>
        </li>
        @endif
        <button type="button" span class="glyphicon glyphicon-pencil" id='pencil' data-toggle="modal" data-target="#myModal">Create</button>
      </ul><form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

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

    @if (Session::has('successMessage'))
        <div class="alert alert-success">
            <p class="flow-text center-align" id="alert">{{{ Session::get('successMessage') }}}</p>
        </div>
    @endif
    @if (Session::has('errorMessage'))
        <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
    @endif

    @yield('content')
</main>
    <!-- for if you dont want in the container -->
    @yield('body')
    <!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript">
    $("#modalopener").click(function() {
    $(".modal-dialog").modal('hide');
   });
</script>

@yield('lowerbody')

@yield('bottomscript')

</body>


</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    @yield('topscript')
</head>


<body>

    @yield('upperbody')
    @yield('abovecontainer')
<main class="container">
    @yield('content')
</main>
    <!-- for if you dont want in the container -->
    @yield('body') 

    <!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

@yield('lowerbody')

@yield('bottomscript')

</body>


</html>
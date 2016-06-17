@extends('layouts.master')

@section('upperbody')
<style>

        body {
            /*color: white;*/
            text-align: center;
            background-color: rgb(145,144,142);
        }
        h1 {
            font-size: 15em;
            color: white;
            text-align: center;
        }
        h2 {
            font-size: 3em;
            color: white;
            text-align: center;
            margin-bottom: 2em;
        }
</style>
@stop


@section('content')
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
<h1>404<h1>
<h2>Not Found.</h2>
<img src="/img/monkey2.png">
<!-- <a href="/">Take me home</a> -->
@stop
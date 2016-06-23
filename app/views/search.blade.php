@extends('layouts.master')

<style type="text/css">
    
.postsHeader{

    padding-top: 150px;
   color:black;
}
</style>
@section('content')
<h1 class= 'container postsHeader'>Posts</h1>
    @foreach($posts as $post)
        <div class= 'container'>
            <h3>{{{$post['body']}}}</h3>
            <h5><p>{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A'); }}</p></h5>
        </div>
    @endforeach
@stop
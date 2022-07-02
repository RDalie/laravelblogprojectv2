@extends('layouts.master')
@include('layouts.navigation')
@section('content')

<br><br><br><br><br><br>
<div class="container">
    <h1>{{$post->title}}</h1>
    <p>{{$post->content}}</p>

<form class="d-inline-block" action="{{route('posts.edit', $post->id)}}">
    @csrf
    <a href="[{}}"></a>
   <input type="submit" value="EDIT" class="btn btn-success">
</form>

<form class="d-inline-block" action="{{route('posts.destroy', $post->id)}}" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="DELETE" class="btn btn-danger" name="" id="">
</form>
</div>
@endsection
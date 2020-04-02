@extends('layouts.app')

@section('content')

<div class="container">
   <h2 class="text-center">Post id {{ $post->id }}</h2>
   
    <form action="/posts/{{$post->id}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="card">
            <h5 class="card-header">{{ $post->title }}</h5>
            <div class="card-body">
                    <p class="card-text">{{$post->content}}</p>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger">Delete blog</button>
                <a href="{{action('PostController@edit', $post->id)}}" class="btn btn-primary">Edit blog</a>
            </div>
        </div>
    </form>
</div>
    
@endsection
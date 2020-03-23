@extends('layouts.app')

@section('content')

<div class="container">

   <h2 class="text-center">All Posts</h2>

   <div class="card">
        <h5 class="card-header">{{ $post->title }}</h5>
        <div class="card-body">
                <p class="card-text">{{$post->content}}</p>
            <a href="" class="btn btn-danger">Remove blog</a>
            <a href="" class="btn btn-dark">Edit blog</a>
        </div>
    </div>
</div>
    
@endsection
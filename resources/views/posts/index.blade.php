@extends('layouts.app')

@section('content')

<div class="container">

   <h2 class="text-center">All Posts</h2>

   @foreach($posts as $post)
   <div class="card mt-4">
        <h5 class="card-header">{{ $post->title }}</h5>
        <div class="card-body">
                <p class="card-text">{{$post->content}}</p>
        <a href="{{URL::route('show', $post->id)}}" class="btn btn-primary">Visit blog</a>
        </div>
        <div class="card-footer text-muted">
            <p>Subreddit</p>
            {{-- @foreach($subreddits as $subreddit)
            <span>{{ $subreddit->name }}</span>
            @endforeach --}}
        </div>
    </div>
    @endforeach
</div>
    
@endsection
@extends('layouts.app')

@section('content')

<div class="container">
   <h2 class="text-center">r/{{ $subreddit->name }}</h2>
    <div class="text-center">
        <a href="/posts/create/{{ $subreddit->id }}" class="text-center btn btn-primary btn-block mt-2">Create Post</a>
    </div>  
    <form action="/posts" method="POST">
        @csrf
        @foreach($posts as $post)
        <div class="card mt-4">
            <h5 class="card-header">{{ $post->title }}</h5>
            <div class="card-body">
                    <p class="card-text">Content- {{ $post->content }}</p>
                    <p class="card-text">Link- {{ $post->link }}</p>
                    <hr/>
                <h4>Comments</h4>
                @foreach($post->comments as $comment)
                    <div class="display-comments">
                        <strong>{{ $comment->user->name }}</strong>
                        <p>{{ $comment->body }}</p>
                        <hr>
                    </div>
                @endforeach
            </div>
            <div class="card-footer text-muted text-center">
                <a href="{{URL::route('show', $post->slug)}}" class="btn btn-success">Comment This Post</a>
            </div>
        </div>
        @endforeach
    </form>
</div>
    
@endsection
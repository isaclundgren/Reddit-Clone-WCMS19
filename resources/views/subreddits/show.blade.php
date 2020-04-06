@extends('layouts.app')

@section('content')

<div class="container">
   <h2 class="text-center">Subreddit id {{ $subreddit->id }}</h2>
   <h3>{{ $subreddit->name }} - {{$subreddit->title}}</h3>
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
        </div>
        @endforeach
        <a href="/posts/create/{{ $subreddit->id }}" class="btn btn-primary mt-2">Create Post</a>
    </form>
</div>
    
@endsection
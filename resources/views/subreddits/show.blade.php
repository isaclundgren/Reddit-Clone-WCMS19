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
            </div>
        </div>
        @endforeach
        <a href="/posts/create/{{ $subreddit->id }}" class="btn btn-primary mt-2">Create Post</a>
    </form>
</div>
    
@endsection
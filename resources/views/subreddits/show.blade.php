@extends('layouts.app')

@section('content')

<div class="container">
   <h2 class="text-center">Subreddit id {{ $subreddit->id }}</h2>
    <form action="/posts" method="POST">
        @csrf
        <div class="card">
            <h5 class="card-header">{{ $subreddit->name }} - {{$subreddit->title}} </h5>
            <div class="card-body">
                @foreach($posts as $post)
                    <p class="card-text">Name - {{ $post->title }}</p>
                    <p class="card-text">Content- {{ $post->content }}</p>
                    <p class="card-text">Link- {{ $post->link }}</p>
                @endforeach
                <a href="/posts/create/{{ $subreddit->id }}" class="btn btn-primary">Create Post</a>
            </div>
        </div>
    </form>
</div>
    
@endsection
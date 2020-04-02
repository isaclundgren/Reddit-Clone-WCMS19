@extends('layouts.app')

@section('content')

<div class="container">
   <h2 class="text-center">Subreddit id {{ $subreddit->id }}</h2>
    <form action="/posts" method="POST">
        @csrf
        <div class="card">
            <h5 class="card-header">{{ $subreddit->name }}</h5>
            <div class="card-body">
                    <p class="card-text">{{$subreddit->title}}</p>
                <a href="/posts/create/{{ $subreddit->id }}" class="btn btn-primary">Create Post</a>
            </div>
        </div>
    </form>
</div>
    
@endsection
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <h2 class="text-center">r/{{ $subreddit->name }}</h2>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="text-center">
                <a href="/posts/create/{{ $subreddit->id }}" class="text-center btn btn-primary mt-2">Create Post</a>
            </div>  
            <form action="/posts" method="POST">
                @csrf
                @foreach($posts as $post)
                <div class="card mt-4" style="width: auto;">
                    <h5 class="card-header">{{ $post->title }}</h5>
                    @if($post->image)
                            <img class="card-img-top" src="{{ asset('images/' . $post->image) }}" alt="Card image cap">
                        @endif
                    <div class="card-body">
                            <p class="card-text">{{ $post->content }}</p>
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
    </div>
</div>
    
@endsection
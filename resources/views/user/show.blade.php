@extends('layouts.app')

@section('content')

<div class="container">
   <h2 class="text-center">Post id {{ $post->id }}</h2>
        <form action="/user/posts/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="card">
            <h5 class="card-header">{{ $post->title }}</h5>
            <div class="card-body">
                <p class="card-text">{{$post->content}}</p>
                <hr/>
                <h4>Comments</h4>
                @foreach($post->comments as $comment)
                    <div class="display-comments">
                        <strong>{{ $comment->user->name }}</strong>
                        <p>{{ $comment->body }}</p>
                        <hr>
                    </div>
                @endforeach    

                @if($post->user_id == auth()->user()->id || auth()->user()->is_admin == true)
                    <p>You are the owner of this post. Choose action your action</p> 
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Delete blog</button>
                    <a href="{{action('PostController@edit', $post->id)}}" class="btn btn-primary">Edit blog</a>
                @else
        </form>
            @endif
        </div>
    </div>
</div>
    
@endsection
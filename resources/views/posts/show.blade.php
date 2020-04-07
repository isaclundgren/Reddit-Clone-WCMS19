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
                    <p>You are the owner of this post. Choose action or comment</p> 
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Delete blog</button>
                    <a href="{{action('PostController@edit', $post->id)}}" class="btn btn-primary">Edit blog</a>
                @else
        </form>
        
            <h6>Add Comment</h4>
                <form action="{{ route('comment.add') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="comment_body" id="comment_body">
                        <input type="hidden" value="{{ $post->id }}" class="form-control" name="post_id" id="post_id" >
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add comment" class="btn btn-warning">
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
    
@endsection
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <h2 class="text-center">{{ $post->title }}</h2>
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="/posts/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="card" style="width: auto">
                    <h5 class="card-header">r/ {{ $post->subreddit->name }}</h5>
                        @if($post->image)
                            <img class="card-img-top" src="{{ asset('images/' . $post->image) }}" alt="Card image cap">
                        @endif
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

                        {{-- @if($post->user_id == auth()->user()->id || auth()->user()->is_admin == true)
                            <p>You are the owner of this post. Choose action or comment</p> 
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Delete blog</button>
                            <a href="{{action('PostController@edit', $post->id)}}" class="btn btn-primary">Edit blog</a>
                        @else --}}
                </form>
                
                    <h6>Add Comment</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('comment.add') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="comment_body" id="comment_body">
                                <input type="hidden" value="{{ $post->id }}" class="form-control" name="post_id" id="post_id" >
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add comment" class="btn btn-info">
                            </div>
                        </form>
                    {{-- @endif --}}
                </div>
                <div class="card-footer text-muted">
                        <p>Posted by {{$post->user->name}} at {{ $post->user->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
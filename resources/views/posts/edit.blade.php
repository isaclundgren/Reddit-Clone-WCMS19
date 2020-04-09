@extends('layouts.app')

@section('content')

<div class="container">
        <form action="{{action('PostController@update', $id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input value="{{ $post->title }}" name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title">
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Content</label>
        <textarea value="{{ $post->content }}" name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post->content}}</textarea>
        </div>

        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
</div>
    
@endsection

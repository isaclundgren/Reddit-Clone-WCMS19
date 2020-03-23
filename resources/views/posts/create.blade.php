@extends('layouts.app')

@section('content')

<div class="container">
    <form action="/posts" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title">
        </div>
        {{-- <div class="form-group">
            <label for="exampleFormControlInput1">Author</label>
            <input name="author"type="text" class="form-control" id="exampleFormControlInput1" placeholder="Author">
        </div> --}}
        
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Content</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
</div>
    
@endsection
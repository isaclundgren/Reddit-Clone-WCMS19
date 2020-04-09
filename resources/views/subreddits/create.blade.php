@extends('layouts.app')

@section('content')

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/subreddits" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name">
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title">
        </div>

        <button type="submit" class="btn btn-dark mt-2">Submit</button>
    </form>
</div>
    
@endsection
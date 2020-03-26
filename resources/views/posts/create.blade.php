@extends('layouts.app')

@section('content')

<div class="container">
    <form action="/posts" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title">
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Content</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <h3>Categories</h3>

        <div class="form-check">
            <input class="form-check-input" name="categories[]" type="checkbox" value="Fitness" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
              Fitness
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" name="categories[]" type="checkbox" value="Strength" id="defaultCheck2">
            <label class="form-check-label" for="defaultCheck2">
            Strength
            </label>
        </div>

          <div class="form-check">
            <input class="form-check-input" name="categories[]" type="checkbox" value="Diet" id="defaultCheck3">
            <label class="form-check-label" for="defaultCheck3">
              Diet
          </label>
        </div>

          <div class="form-check">
            <input class="form-check-input" name="categories[]" type="checkbox" value="General" id="defaultCheck4">
            <label class="form-check-label" for="defaultCheck4">
              General
          </label>
        </div>

        <button type="submit" class="btn btn-dark mt-2">Submit</button>
    </form>
</div>
    
@endsection
@extends('layouts.app')

@section('content')



<div class="container">
        <h2 class="text-center">Welcome {{ $user->name }}</h2>
    <table class="table mt-4">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Link</th>
            <th scope="col">Remove or Update?</th>
          </tr>
        </thead>
        @foreach($posts as $post)
            <tbody>
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->link }}</td>
                <td><a href="{{URL::route('show', $post->id)}}"><button type="submit" class="btn btn-primary">Click here!</button></a></td>
            </tr>
            </tbody>
        @endforeach
      </table>
</div>

@endsection 
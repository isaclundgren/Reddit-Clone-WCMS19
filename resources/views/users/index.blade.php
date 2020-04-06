@extends('layouts.app')

@section('content')

<div class="container">
        <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                @foreach ($users as $user)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->age }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    </tbody>
                @endforeach
        </table>

        <h2>All Posts</h2>

        <table class="table">
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
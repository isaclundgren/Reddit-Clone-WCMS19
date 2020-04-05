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
</div>

@endsection 
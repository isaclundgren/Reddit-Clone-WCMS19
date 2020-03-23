@extends('layouts.app')

@section('content')

<div class="wrapper">
    <h2>Registrered Users</h2>
    <ul>
        
        @foreach ($users as $user)
            <li>{{$user->name}} - {{$user->email}}</li>
        @endforeach
    </ul>
</div>
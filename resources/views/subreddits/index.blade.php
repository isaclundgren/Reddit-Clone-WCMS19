@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center">Subreddits</h2>
    <div class="row justify-content-center">
        <div class="col-lg-6">
                @foreach($subreddits as $subreddit)
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">{{ $subreddit->name }} <span class="ml-2">r/{{ $subreddit->title }}</span><a href="{{action('SubredditController@show', $subreddit->id)}}" class="btn btn-success btn-sm float-right">Visit Subreddit</a></li>
                        @foreach($subreddit->posts as $post)
                        <li class="list-group-item">{{ $post->title }} <span class="float-right"><a href="{{URL::route('show', $post->id)}}"><button class="btn btn-primary">Go to</button></a></span> </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </form>
        </div>
    </div>
</div>

@endsection
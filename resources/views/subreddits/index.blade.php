@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center">Subreddits</h2>
    <div class="row justify-content-center">
        <div class="col-lg-6">
                @foreach($subreddits as $subreddit)
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">{{ $subreddit->name }} <span class="ml-2">r/{{ $subreddit->title }}</span><button type="submit" class="btn btn-primary btn-sm float-right"><a href="{{URL::route('subreddit.show', $subreddit->id)}}">Go To!</a></button></li>
                        @foreach($subreddit->posts as $post)
                        <li class="list-group-item">{{ $post->title }}</li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </form>
        </div>
    </div>
</div>

@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Subreddit;
Use App\User;
use Illuminate\Support\Str;

class SubredditController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    

    public function index() {
        return view('subreddits.index', [
            'subreddits' => Subreddit::with('posts')->get()
        ]);
    }


    public function create() {
        return view ('subreddits.create');
    }

    public function store(Subreddit $subreddit) {
        $data = request()->validate([
            'name' => 'required',
            'title' => 'required',
        ]);
        
        $subreddits = auth()->user()->subreddits()->create($data);

        return redirect('/subreddits/'.$subreddits->id)
            ->with('message', 'Your subreddit looks good, now post something!');
    }


    // public function show(Subreddit $subreddit) {
    //     $subreddit = Subreddit::where('slug', $slug)->first();
    //         if(is_null($subreddit)) {
    //             return redirect('subreddits');
    //         } else {
    //             return view('subreddits.show')
    //                 ->with('subreddit', $subreddit)
    //                 ->with('posts', $posts);
    //         }

    // }

    public function show(\App\Subreddit $subreddit) {
        $posts = Subreddit::findOrFail($subreddit->id)->posts()->get();
        return view('subreddits.show')
            ->with('subreddit', $subreddit)
            ->with('posts', $posts);
    }

      // return view('subreddits.show', [
        //     'subreddit' => $subreddit,
        //     'posts' => $subreddit->posts
        // ]);

        // if(auth()->user()->id === $subreddit->user_id) {
        //     $subreddit = Subreddit::findOrFail($subreddit->id);
        //     return view('subreddits.show', compact('subreddit'));
        // } else {
        //     return redirect('/subreddits');
        // }
}

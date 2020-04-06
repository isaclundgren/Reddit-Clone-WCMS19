<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminController extends Controller
{
    public function index() {
        $users = User::all();
        $posts = Post::all();
         if(Auth::user()->is_admin == true){
             return view ('users.index')
                ->with('users', $users)
                ->with('posts', $posts);
         } else {
             return redirect('home');
         }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;


class UserController extends Controller
{
        public function index (){
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            return view('user.index')
                ->with('user', $user)
                ->with('posts', $user->posts);
        }

        public function destroy() {
            $post = Post::findOrFail($id)->delete();
            return redirect('/user');
        }

        public function update() {
            //
        }
}



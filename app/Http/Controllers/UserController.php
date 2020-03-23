<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;


class UserController extends Controller
{
   public function index() {
       $users = User::all();


        if(Auth::user()->is_admin == true){
            return view ('users.index', [
                'users' => $users
            ]);
        } else {
            return redirect('home');
        }
   }
}



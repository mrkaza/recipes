<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Recepie;
use App\User;

class UserController extends Controller
{
    public function index($id) {
        $user = User::findOrFail($id);

        $recepies = Recepie::where('user_id', $user->id)->paginate(9);

        return view('users.index', ['user'=>$user, 'recepies'=>$recepies]);
    }

    public function favourites($id) {
        $user = User::findOrFail($id);
        $recepies = $user->recepies;

        return view('users.favourites',['user'=>$user, 'recepies'=>$recepies]);
    }
}

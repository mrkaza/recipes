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

        $recepies = Recepie::all()->where('user_id', $user->id);

        return view('users.index', ['user'=>$user, 'recepies'=>$recepies]);
    }
}
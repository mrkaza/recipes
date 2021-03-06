<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recepie;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class RecepieController extends Controller
{
    public function index() {
        $user = Auth::user();
        $recepies = Recepie::orderBy('created_at','desc')->paginate(9);

        // $hasRecepie = $user->recepies()->where('id', 1)->exists();

        // echo $hasRecepie;
        return view('recepies.index',['recepies'=>$recepies,'user'=>$user]);
    }

    public function create() {
        return view('recepies.create');
    }

    public function store() {
        $recepie = new Recepie();

        $recepie->name = request('name');
        $recepie->time = request('time');
        $recepie->description = request('description');
        $recepie->user_id = Auth::id();

        $recepie->save();

        return redirect('/recepies');
    }

    public function show($id) {
        $recepie = Recepie::findOrFail($id);
        $user = Auth::user();
        $comments = $recepie->comments;

        return view('recepies.show', ['recepie'=>$recepie, 'user'=>$user, 'comments'=>$comments]);
    }

    public function comment($id) {
        $recepie = Recepie::findOrFail($id);
        $user = Auth::user();
        $comment = new Comment();
        $comment->recepie_id = $recepie->id;
        $comment->user_id = $user->id;
        $comment->comment = request('comment');
        
        $comment->save();

        return redirect()->route('recepies.show', $recepie->id);

    }

    public function update($id) {
        $recepie = Recepie::findOrFail($id);

        return view('recepies.update', ['recepie'=>$recepie]);
    }
    public function edit($id) {
        $recepie = Recepie::findOrFail($id);

        $recepie->name = request('name');
        $recepie->time = request('time');
        $recepie->description = request('description');

        $recepie->save();

        return redirect('/recepies');
    }

    public function destroy($id) {
        $recepie = Recepie::findOrFail($id);
        $recepie->delete();

        return redirect()->route('users.index', Auth::id());
    }

    public function favourites($id) {
        $user = Auth::user();
        $recepie = Recepie::findOrFail($id);

        $recepie->users()->attach($user->id);
        return redirect()->back();
    }

    public function delFavourites($id) {
        $user = Auth::user();
        $recepie = Recepie::findOrFail($id);

        $recepie->users()->detach($user->id);
        return redirect()->back();
    }
}

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex justify-content-center">
        <h1>{{$recepie->name}}</h1>
    </div>
    <div class="recepie-text">
        <p>Time to make: 
            <span class="time">
                <i class="far fa-clock"></i> {{$recepie->time}}
            </span>
        </p>
        <p> Description:
            <span class="time">
                {{$recepie->description}}
            </span>
        </p>
        <p> Created by:
            <span><a class="text-danger" href="{{route('users.index', $recepie->user->id)}}">{{$recepie->user->name}}</a></span>
        </p>
    </div>
    
    <div class="comments">
        <h5>Comments:</h3>
        @if($comments->count() == 0)
            <p class="text-info">There are no comments</p>
        @endif
        @foreach($comments as $comment)
            <div class="comment card">
                <div class="card-body">
                    <a class="text-danger" href="{{route('users.index', $comment->user->id)}}">{{$comment->user->name}} :</a>  
                    <p class="mb-0">{{$comment->comment}}</p>     
                </div>      
            </div>
        @endforeach
        <div class="form-group mt-4">
            <form action="/comments/{{$recepie->id}}" method="post">
                @csrf 
                <label for="comment">Comment:</label>
                <input type="text" class="form-control" id="comment" name="comment">
                <input class="btn text-danger" type="submit" value="Submit comment">
            </form>
            <label for="comment"></label>
        </div>
    </div>

    
    <div class="container mt-3">
        <a class="btn btn-link" href="{{route('recepies.index')}}"> <- Back to all recepies</a>
        @if(Auth::user())
            @if($recepie->user_id == $user->id)
                <a class="btn btn-danger" href="{{route('recepies.update', $recepie->id)}}">Change recepie</a>
            @endif
        @endif
    </div>
</div>


@endsection
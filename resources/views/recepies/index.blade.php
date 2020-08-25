@extends('layouts.app')

@section('content')

<div class="container">
    <div class="title d-flex justify-content-center">
        <h1>Recepies</h1>
    </div>
    

    <div class="container mx-auto">
        <div class="row">
        @foreach($recepies->sortByDesc('created_at') as $recepie)
            <div class="recepie col-lg-4 col-md-4 col-sm-1 mt-4">
                <div class="card">
                    <div class="card-body">
                        <a class="red-text" href="{{route('recepies.show', $recepie->id)}}"><h3 class="card-title">{{$recepie->name}}</h3></a>
                        <p class="time"><i class="far fa-clock"></i> {{$recepie->time}}</p>
                        <p class="desc card-text">{{Str::limit($recepie->description,50)}}</p>
                        <p>Created by: <a href="{{route('users.index', $recepie->user->id)}}" class="user">{{$recepie->user->name}}</a></p>

                        @if(Auth::user())

                        @if(!$user->recepies()->where('id',$recepie->id)->exists())
                        <form action="/recepies/{{$recepie->id}}" method="post">
                            @csrf
                            <button class="btn" type="submit"><i class="far fa-bookmark fa-2x"></i></button> 
                        </form>
                        @endif

                        @if($user->recepies()->where('id',$recepie->id)->exists())
                        <form action="/recepies/{{$recepie->id}}" method="post">
                            @csrf 
                            @method('DELETE')
                            <button class="btn" type="submit"><i class="fas fa-bookmark fa-2x"></i></button>
                        </form> 
                        @endif

                        @endif
                        

                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <div class="mx-auto d-flex mt-4">
            <a href="{{route('recepies.create')}}" class="btn btn-danger mx-auto">Create recepie</a>
        </div>
        
    </div>
</div>


@endsection
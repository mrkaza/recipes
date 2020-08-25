@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <h3>Your Favourite Recepies:</h3>
    </div>
   
   @if($recepies->count() == 0)
    <p class="text-info">You have no favourites</p>
   @endif
   <div class="row">
    @foreach($recepies as $recepie)
    <div class="recepie col-sm-1 col-md-4 mt-4">
        <div class="card">
            <div class="card-body">
                <a class="text-danger" href="{{route('recepies.show', $recepie->id)}}"><h3>{{$recepie->name}}</h3></a>
                <p class="time"><i class="far fa-clock"></i> {{$recepie->time}}</p>
                <p class="desc">{{$recepie->description}}</p>

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
                
            </div>
        </div>
    </div>
   @endforeach
   </div>

   <a class="btn mt-3" href="{{route('users.index', Auth::id())}}"><- Back to your recepies</a>

</div>
@endsection

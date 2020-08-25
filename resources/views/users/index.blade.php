@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <h1>{{$user->name}}'s profile</h1>
    </div>
   <h3>{{$user->name}}'s Recepies:</h3>
   @if($recepies->count() == 0)
    <p class="text-info">You have no recepies</p>
   @endif
   <div class="row">
    @foreach($recepies as $recepie)
    <div class="recepie col-sm-1 col-md-4 mt-4">
        <div class="card">
            <div class="card-body">
                <a class="text-danger" href="{{route('recepies.show', $recepie->id)}}"><h3>{{$recepie->name}}</h3></a>
                <p class="time"><i class="far fa-clock"></i> {{$recepie->time}}</p>
                <p class="desc">{{$recepie->description}}</p>

                @if($user->id == Auth::id())
                <div class="d-flex justify-content-around">
                    <a class="btn btn-outline-danger" href="{{route('recepies.update', $recepie->id)}}">Change recepie</a>
                    <form action="{{route('recepies.destroy', $recepie->id)}}" method="post">
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-danger">Delete recepie</button>
                     </form>
                </div> 
                @endif()
            </div>
        </div>
        
        
    </div>
   @endforeach
   </div>
   @if($user->id == Auth::id())
   <div class="favourites d-flex justify-content-around">
       <a href="{{route('recepies.index')}}" class="btn"><- Back to all recepies</a>
        <a class="btn btn-danger" href="{{route('users.favourites', Auth::id())}}">See Favourite Recepies</a>
   </div>
   @endif

</div>
@endsection

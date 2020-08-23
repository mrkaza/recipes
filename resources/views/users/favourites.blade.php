@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
    </div>
   <h3>Your Favourite Recepies:</h3>
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
            </div>
        </div>
    </div>
   @endforeach
   </div>

</div>
@endsection

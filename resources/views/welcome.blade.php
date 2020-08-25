@extends('layouts.app')

@section('content')

{{-- <div class="container">
    <h1>Recepies</h1>
    <a href="{{route('recepies.index')}}">Show all recepies</a>
</div> --}}

<div class="homepage d-flex justify-content-center">
    <div class="inside">
        <div >
            <h1>Recepies under 1 hour</h1>
            <div class=" d-flex justify-content-around mt-4">
                <a href="{{route('recepies.index')}}" class="btn btn-warning">See Recepies</a>
                <a href="{{route('recepies.create')}}" class="btn btn-danger">Create Recepie</a>
            </div>
        </div>
    </div>
</div>


@endsection
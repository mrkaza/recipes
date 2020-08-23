@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Update Recepie {{$recepie->name}}</h1>
<div class="form-group">
    <form action="{{route('recepies.edit', $recepie->id)}}" method="post">
        @csrf
        @method('put')
        <label for="name">Name:</label>
        <input class="form-control" type="text" id="name" name="name" value="{{$recepie->name}}">
        <br>
        <label for="time">Time to make:</label>
        <select class="form-control" name="time" id="time">
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
            <option value="60">60</option>
        </select>
        <br>
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$recepie->description}}</textarea>
        <br>
        <input class="btn btn-danger" type="submit" value="Update recepie">
    </form>
</div>

</div>


@endsection
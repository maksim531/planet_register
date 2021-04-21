@extends('layouts.app')
@section('content')
    <h1>Планета № {{$planet->id}}</h1>

    <div><b>{{$planet->name}}</b></div>
    <br>
    <div>{{$planet->description}}</div>
    <br>
    <a class="nav-link" href="{{route('planets.edit', ["planet" => $planet->id])}}">Редактировать</a>
    <a class="nav-link" href="{{route('planets.index')}}">К планетам</a>

@endsection

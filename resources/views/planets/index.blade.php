@extends('layouts.app')
@section('content')

    <h1>Список планет</h1>

    <ul class="list-group">
        @foreach ($planets as $planet)
            <a href="{{route('planets.update', ["planet" => $planet->id])}}" class="item-planet"><li class="list-group-item">{{$planet->name}}</li></a>
        @endforeach
    </ul>
    <br>
    <a class="nav-link" href="{{route('planets.create')}}">Зарегистрировать планету</a>

@endsection

<style>
    .item-planet{
        cursor: pointer;
    }
</style>

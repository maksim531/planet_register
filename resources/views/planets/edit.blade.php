@extends('layouts.app')
@section('content')
    <h1>Планета № {{$planet->id}}</h1>
    <form action="{{route('planets.update', ["planet" => $planet->id])}}" method="POST">
        @method('PUT')
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="name" value="{{$planet->name}}" class="form-control">
            <br>
            <input type="text" name="description" value="{{$planet->description}}" class="form-control">
            <br>
            <input type="submit" value="Сохранить" class="btn btn-primary">
        </div>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (isset($successSave) && $successSave)
        <div class="text-success">Планета успешно сохранена</div>
    @endif

    <a href="{{route('planets.show', ["planet" => $planet->id])}}" class="nav-link">Смотреть</a>

@endsection

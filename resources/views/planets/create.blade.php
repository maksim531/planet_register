@extends('layouts.app')
@section('content')
<h1>Регистрация планеты</h1>
<form action="{{route('planets.store')}}" method="POST">
    @method('post')
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Название</label>
        <input type="text" class="form-control" id="name" name="name">
        <br>
        <label for="description">Описание</label>
        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        <br>
        <input type="submit" class="btn btn-primary" value="Создать">
    </div>

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
        <div class="text-success">Планета успешно добавлена</div>
    @endif
</form>

<a class="nav-link" href="{{route('planets.index')}}">К планетам</a>
@endsection

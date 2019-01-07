@extends('layouts.admin')


@section('content')

    <h1>Modificare utilizator</h1>

    {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id]]) !!}

    <div class="form-goup">
        {!! Form::label('name', 'Nume:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-goup">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-goup">
        {!! Form::label('role_id', 'Rol:') !!}
        {!! Form::select('role_id', ['' => 'Alegeți opțiunea'] + $roles, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-goup">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', array(1 => 'Activ', 0 => 'Dezactivat'), null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-goup">
        {!! Form::label('password', 'Parola:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>

    <hr>

    <div class="form-goup">
        {!! Form::submit('Modificare utilizator', ['class'=>'btn btn-primary col-sm-3']) !!}
    </div>

    {!! Form::close() !!}

    <span class="col-sm-6"></span>

    <button type="button" class="btn btn-success col-sm-3" onclick="location.href='{{route('admin.users.index')}}'">Renunță</button>


    @include('includes.form_error')

@endsection

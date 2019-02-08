@extends('layouts.admin')


@section('content')
    <div class="row">
        <h1>Creare categorie</h1>

        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Denumire:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>


        <hr>

        <div class="form-group">
            {!! Form::submit('Creare categorie', ['class'=>'btn btn-primary col-sm-3']) !!}
        </div>

        {!! Form::close() !!}

        <span class="col-sm-6"></span>

        <button type="button" class="btn btn-success col-sm-3"
                onclick="location.href='{{route('admin.categories.index')}}'">Renunță
        </button>
    </div>

    @include('includes.form_error')

@endsection
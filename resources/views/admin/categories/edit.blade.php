@extends('layouts.admin')


@section('content')
    <div class="row">
        <h1>Modificare categorie</h1>

        {!! Form::model($category,['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}


        <div class="form-goup">
            {!! Form::label('name', 'Denumire:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>


        <hr>

        <div class="form-goup">
            {!! Form::submit('Modificare categorie', ['class'=>'btn btn-primary col-sm-3']) !!}
        </div>

        {!! Form::close() !!}

        <span class="col-sm-6"></span>

        <button type="button" class="btn btn-success col-sm-3"
                onclick="location.href='{{route('admin.categories.index')}}'">Renunță
        </button>
    </div>

    @include('includes.form_error')

@endsection
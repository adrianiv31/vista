@extends('layouts.admin')


@section('content')
    <div class="row">
        <h1>Creare producător</h1>

        {!! Form::open(['method'=>'POST', 'action'=>'AdminProducersController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Denumire:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>


        <hr>

        <div class="form-group">
            {!! Form::submit('Creare producător', ['class'=>'btn btn-primary col-sm-3']) !!}
        </div>

        {!! Form::close() !!}

        <span class="col-sm-6"></span>

        <button type="button" class="btn btn-success col-sm-3"
                onclick="location.href='{{route('admin.producers.index')}}'">Renunță
        </button>
    </div>

    @include('includes.form_error')

@endsection
@extends('layouts.admin')


@section('content')
    <div class="row">
        <h1>Creare anexă</h1>

        <div class="row">

            <div class="panel panel-primary">
                <div class="panel-heading">Date contract</div>
                <div class="panel-body">
                    <div class="col-sm-3">
                        <div class="form-group">
                            {!! Form::label('name', 'Categorie:') !!}
                            {!! Form::select('cat', array(1 => 'ÎNCHIDERE SOLD', 0 => 'ALTCEVA'), 0, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Tip contract:') !!}
                            {!! Form::select('cat', array(1 => 'CPT', 0 => 'ALTCEVA'), 0, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Data contract:') !!}
                            {!! Form::select('cat', array(1 => '16.11.2018', 0 => 'ALTCEVA'), 0, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            {!! Form::label('name', 'Furnizor:') !!}
                            {!! Form::select('cat', array(1 => 'AGRO SEBY TRANS SRL', 0 => 'ALTCEVA'), 0, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Nr. contract:') !!}
                            {!! Form::text('name', '6554', ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Produs:') !!}
                            {!! Form::select('cat', array(1 => 'PORUMB', 0 => 'ALTCEVA'), 0, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="panel panel-success">
                            <div class="panel-heading">Date furnizor</div>
                            <div class="panel-body">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Cod FZ:') !!}
                                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('name', 'Cod DV:') !!}
                                        {!! Form::text('name', 'UE1', ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Nume DV:') !!}
                                        {!! Form::text('name', 'UNGUREANU ELENA', ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('name', 'CUI:') !!}
                                        {!! Form::text('name', 'RO31590521', ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="panel panel-success">
                            <div class="panel-heading">Acțiuni</div>
                            <div class="panel-body">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::checkbox('verificat', '1', true) !!}
                                        {!! Form::label('verificat', 'Verificat') !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::checkbox('validat', '1', false) !!}
                                        {!! Form::label('validat', 'Validat') !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::checkbox('trimis', '1', true) !!}
                                        {!! Form::label('trimis', 'Trimis DV') !!}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::checkbox('bo', '1', false) !!}
                                        {!! Form::label('bo', 'BO') !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::checkbox('inchis', '1', false) !!}
                                        {!! Form::label('inchis', 'Închis') !!}
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        {{--{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store']) !!}--}}

        {{--<div class="form-group">--}}
        {{--{!! Form::label('name', 'Nume:') !!}--}}
        {{--{!! Form::text('name', null, ['class'=>'form-control']) !!}--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
        {{--{!! Form::label('email', 'Email:') !!}--}}
        {{--{!! Form::email('email', null, ['class'=>'form-control']) !!}--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
        {{--{!! Form::label('role_id', 'Rol:') !!}--}}
        {{--{!! Form::select('roles[]', ['' => 'Alegeți opțiunea'] + $roles, null, ['class'=>'form-control', 'multiple' => 'multiple']) !!}--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
        {{--{!! Form::label('is_active', 'Status:') !!}--}}
        {{--{!! Form::select('is_active', array(1 => 'Activ', 0 => 'Dezactivat'), 0, ['class'=>'form-control']) !!}--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
        {{--{!! Form::label('password', 'Parola:') !!}--}}
        {{--{!! Form::password('password', ['class'=>'form-control']) !!}--}}
        {{--</div>--}}

        {{--<hr>--}}

        {{--<div class="form-group">--}}
        {{--{!! Form::submit('Creare utilizator', ['class'=>'btn btn-primary col-sm-3']) !!}--}}
        {{--</div>--}}

        {{--{!! Form::close() !!}--}}

        {{--<span class="col-sm-6"></span>--}}

        {{--<button type="button" class="btn btn-success col-sm-3" onclick="location.href='{{route('admin.users.index')}}'">--}}
        {{--Renunță--}}
        {{--</button>--}}
    </div>

    @include('includes.form_error')

@endsection
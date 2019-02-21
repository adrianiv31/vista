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
                            {!! Form::date('due_date', null, ['class'=>'form-control']) !!}
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
                                        {!! Form::checkbox('bo', '1', true) !!}
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

        <div class="row">

            <div class="col-sm-4">
                <div class="panel panel-success">
                    <div class="panel-heading">Locații</div>
                    <div class="panel-body">
                        <div class="form-group">
                            {!! Form::label('name', 'Încărcare:') !!}
                            {!! Form::select('cat', array(1 => 'GIURGIU / PERISORU', 0 => 'ALTCEVA'), 0, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Cântar:') !!}
                            {!! Form::select('cat', array(1 => '', 0 => 'ALTCEVA'), 0, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Descărcare:') !!}
                            {!! Form::select('cat', array(1 => 'GIURGIU / CARGIL', 0 => 'ALTCEVA'), 0, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="panel panel-success">
                    <div class="panel-heading">Detalii</div>
                    <div class="panel-body">

                        <div class="form-group">
                            {!! Form::label('name', 'Cantitate:') !!}
                            {!! Form::text('name', '50,84', ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Valută:') !!}
                            {!! Form::select('cat', array(1 => 'RON', 0 => 'ALTCEVA'), 0, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('name', 'Alocare inițială:') !!}
                            {!! Form::select('cat', array(1 => 'CARGIL AGRICULTURA', 0 => 'ALTCEVA'), 0, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Execuție de la:') !!}
                            {!! Form::date('due_date', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'până la:') !!}
                            {!! Form::date('due_date', null, ['class'=>'form-control']) !!}
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="panel panel-success">
                    <div class="panel-heading">Observații</div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div class="form-group">

                                {!! Form::textarea('name', null, ['class'=>'form-control']) !!}
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-heading">Template</div>
                        <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Selectează template:') !!}
                                    {!! Form::select('cat', array(1 => 'DRAFT CONTRACT CEREALE 2018', 0 => 'ALTCEVA'), 0, ['class'=>'form-control']) !!}
                                </div>

                                <button class="btn btn-warning" type="button">Genereazâ</button>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-heading">NAV</div>
                        <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Număr comandă NAV:') !!}
                                    {!! Form::text('name', 'COG029027', ['class'=>'form-control']) !!}
                                </div>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-heading">NAV-Situație recepții</div>
                        <div class="panel-body">
                            <div class="col-sm-12">

                                <button class="btn btn-warning" type="button">Avize furnizor&nbsp;&nbsp;&nbsp;<span
                                            class="badge">2</span></button>
                                <button class="btn btn-warning" type="button">Recepții&nbsp;&nbsp;&nbsp;<span
                                            class="badge">0</span></button>
                                <button class="btn btn-warning" type="button">Facturi&nbsp;&nbsp;&nbsp;<span
                                            class="badge">0</span></button>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-heading">Prețuri</div>
                        <div class="panel-body">
                            <div class="col-sm-12">

                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Preț</th>
                                        <th scope="col">Valoare</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Preț contract CTP</th>
                                        <td>669.00</td>

                                    </tr>

                                    </tbody>
                                </table>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-heading">Calitate</div>
                        <div class="panel-body">
                            <div class="col-sm-12" style="overflow-x: auto;white-space: nowrap;">

                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Tip cereale</th>
                                        <th scope="col">Indice</th>
                                        <th scope="col">Baza</th>
                                        <th scope="col">Min</th>
                                        <th scope="col">Max</th>
                                        <th scope="col">Tip penalizare</th>
                                        <th scope="col">Penalizare la</th>
                                        <th scope="col">Valoare penalizare</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">general</th>
                                        <td>Umiditate</td>
                                        <td>14.00</td>
                                        <td>0.00</td>
                                        <td>15.00</td>
                                        <td>procentual</td>
                                        <td>preț</td>
                                        <td>1.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">general</th>
                                        <td>Umiditate</td>
                                        <td>14.00</td>
                                        <td>0.00</td>
                                        <td>15.00</td>
                                        <td>procentual</td>
                                        <td>preț</td>
                                        <td>1.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">general</th>
                                        <td>Umiditate</td>
                                        <td>14.00</td>
                                        <td>0.00</td>
                                        <td>15.00</td>
                                        <td>procentual</td>
                                        <td>preț</td>
                                        <td>1.00</td>
                                    </tr>

                                    </tbody>
                                </table>


                            </div>

                        </div>
                    </div>
                </div>


            </div>

            <div class="col-sm-8">
                <div class="panel panel-success">
                    <div class="panel-heading">Fișiere</div>
                    <div class="panel-body">
                        <div class="panel with-nav-tabs panel-default">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1default" data-toggle="tab">Librarie documente</a></li>
                                    <li class=""><a href="#tab2default" data-toggle="tab">Editează draft</a></li>
                                    <li class=""><a href="#tab3default" data-toggle="tab">Calitate furnizor vs
                                            trader</a></li>

                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="tab1default">
                                        <div class="col-sm-3">
                                            <table class="table">
                                                <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Fișier</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">AGRO SEBY TRANS SRL6554.pdf</th>


                                                </tr>
                                                <tr>
                                                    <th scope="row">AGRO SEBY TRANS SRL6554.pdf</th>


                                                </tr>
                                                <tr>
                                                    <th scope="row">AGRO SEBY TRANS SRL6554.pdf</th>


                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-9">

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2default">Default 2</div>
                                    <div class="tab-pane fade" id="tab3default">Default 3</div>

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
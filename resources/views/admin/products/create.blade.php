@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h1>Creare produs</h1>

            {!! Form::open(['method'=>'POST', 'action'=>'AdminProductsController@store','files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('producer_id', 'Producător:') !!}
                {!! Form::select('producer_id', ['' => 'Alegeți opțiunea'] + $producers, null, ['class'=>'form-control','id'=>'prod']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('specie', 'Specie:') !!}
                {!! Form::text('specie', null, ['class'=>'form-control','id'=>'spc']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('insamantare', 'Perioada de însămânțare:') !!}
                {!! Form::select('insamantare', array('' => 'Alegeți opțiunea','PRIMAVARA' => 'PRIMAVARA','TOAMNA' => 'TOAMNA'), null, ['class'=>'form-control','id'=>'per']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Denumire:') !!}
                {!! Form::text('name', null, ['class'=>'form-control','id'=>'nume']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('categorie_bio', 'Categorie biologică:') !!}
                {!! Form::text('categorie_bio', null, ['class'=>'form-control','id'=>'bio']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('cod_produs', 'Cod produs:') !!}
                {!! Form::text('cod_produs', null, ['class'=>'form-control','readonly'=>'readonly','id'=>'cod']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Categorie:') !!}
                {!! Form::select('category_id', ['' => 'Alegeți opțiunea'] + $categories, null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('descriere', 'Descriere:') !!}
                {!! Form::text('descriere', null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('um', 'Unitatea de măsură:') !!}
                {!! Form::text('um', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('doc_id', 'FISA TEHNICA DE PRODUS / SECURITATE:') !!}
                {!! Form::file('doc_id', null, ['class'=>'form-control']) !!}
            </div>


            <hr>

            <div class="form-group">
                {!! Form::submit('Creare produs', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>

            {!! Form::close() !!}

            <span class="col-sm-6"></span>

            <button type="button" class="btn btn-success col-sm-3"
                    onclick="location.href='{{route('admin.products.index')}}'">
                Renunță
            </button>
        </div>

        <div class="col-sm-6" id="prev">
            <h1>Documente atasate</h1>
            <div class="row">
                <table class="table">
                    <thead class="thead-light">
                    <tr>

                        <th scope="col">Document</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="doc">


                    </tbody>
                </table>
            </div>
            <div class="row" id="doc-pdf"></div>
        </div>
    </div>

    @include('includes.form_error')

@endsection

@section('footer')
    <script>
        $(document).ready(function () {

            $("#prod,#spc,#per,#nume,#bio").change(function () {

                var prod = $("#prod").find('option:selected').text();
                var spc = $("#spc").val();
                var per = $("#per").val();
                var nume = $("#nume").val();
                var bio = $("#bio").val();

                var cod = prod.substr(0, 2) + spc.substr(0, 2) + per.substr(0, 2) + nume.substr(0, 2) + bio.substr(0, 2);

                $("#cod").val(cod.toUpperCase());


            });


            $('#doc_id').change(function (event) {

                var file = URL.createObjectURL(event.target.files[0]);
                filename = $("#doc_id").val();
                $('#doc').html('<tr><th scope="col">'+filename+'</th><th scope="col"><button class="btn-danger" id="stergedoc">Sterge</button></th></tr>');

                $('#doc-pdf').append('<embed src="'+file+'" width="500" height="700">');
            });

            $("#doc").on('click','#stergedoc', function(){
                var el = $('#doc_id');
                el.wrap("<form></form>").closest('form').get(0).reset();
                el.unwrap();
                $("#doc").html("");
                $("#doc-pdf").html("");

            });
        });



    </script>
@endsection
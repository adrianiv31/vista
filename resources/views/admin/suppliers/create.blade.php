@extends('layouts.admin')


@section('content')
    <div class="row">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminSuppliersController@store', 'id'=>'fileupload']) !!}
        <div class="col-sm-6">
            <h1>Creare furnizor</h1>


            <div class="form-group">
                {!! Form::label('name', 'Denumire:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('cui', 'CUI:') !!}
                {!! Form::text('cui', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('reg_com', 'Registrul Comerțului:') !!}
                {!! Form::text('reg_com', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('address', 'Adresa:') !!}
                {!! Form::text('address', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('supplier_code', 'Cod furnizor:') !!}
                {!! Form::text('supplier_code', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('contact_name', 'Persoana de contact:') !!}
                {!! Form::text('contact_name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('contact_position', 'Funcție persoana de contact:') !!}
                {!! Form::text('contact_position', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('contact_tel', 'Telefon persoana de contact:') !!}
                {!! Form::text('contact_tel', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('contact_email', 'Email persoana de contact:') !!}
                {!! Form::text('contact_email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('due_date', 'Data scadenta la plată:') !!}
                {!! Form::date('due_date', null, ['class'=>'form-control']) !!}
            </div>

            <div id="docs">
                <div class="form-group">
                    {!! Form::label('doc_id', 'Contract fizic:') !!}
                    {!! Form::file('doc_id', ['class'=>'form-control docid', 'multiple']) !!}
                </div>
            </div>

            <hr>

            <div class="form-group">
                {!! Form::submit('Creare furnizor', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>


            <span class="col-sm-6"></span>

            <button type="button" class="btn btn-success col-sm-3"
                    onclick="location.href='{{route('admin.suppliers.index')}}'">
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
        {!! Form::close() !!}
    </div>

    @include('includes.form_error')

@endsection

@section('footer')

    <script>
        $(document).ready(function () {

            var nr_docs = 1;
            var files = [];

            $('#docs').on('change', '.docid', function () {//.change(function (event) {//.on('change', '.document', function(){//.change(function (event) {


                $.merge(files,$('.docid')[0].files);

                $('#doc').html("");
                $('#doc-pdf').html("");

                for (var i = 0, f; f = files[i]; i++) {


                    var reader = new FileReader();

                    // Closure to capture the file information.
                    reader.onload = (function (theFile,i) {
                        return function (e) {
                            // Render thumbnail.
//                            var span = document.createElement('span');
//                            span.innerHTML = ['<img class="thumb" src="', e.target.result,
//                                '" title="', escape(theFile.name), '"/>'].join('');
//                            document.getElementById('list').insertBefore(span, null);

                            $('#doc').append('<tr><th scope="col">' + theFile.name + '</th><th scope="col"><button class="btn-danger stergedoc" data-id="' + i + '">Sterge</button></th></tr>');

                            $('#doc-pdf').html('<embed src="' + e.target.result + '" width="500" height="700">');
                        };
                    })(f,i);

                    // Read in the image file as a data URL.
                    reader.readAsDataURL(f);
                    nr_docs++;


//

                }


//                nr_docs++;
//
//                var html = '<div class="form-group"><label for="doc_id' + nr_docs + '">Contract fizic ' + nr_docs + ':</label><input name="doc_id' + nr_docs + '" type="file" id="doc_id' + nr_docs + '" class="form-control docid"></div>';
//                $('#docs').append(html);
//
//
//                var file = URL.createObjectURL(event.target.files[0]);
//                filename = $(this).val();
//
//                $('#doc').append('<tr><th scope="col">' + filename + '</th><th scope="col"><button class="btn-danger stergedoc" data-id="' + (nr_docs - 1) + '">Sterge</button></th></tr>');
//
//                $('#doc-pdf').html('<embed src="' + file + '" width="500" height="700">');
            });

            $("#doc").on('click', '.stergedoc', function (e) {

                e.preventDefault();
                var eldata = $(this);
                var id = eldata.data('id');


                for (var i = 0; i < files.length; i++) {

                    if (i==id) {
                        files.splice(i, 1);
                        break;
                    }
                }

                $('#doc').html("");
                $('#doc-pdf').html("");

                nr_docs = 1;
                for (var i = 0, f; f = files[i]; i++) {


                    var reader = new FileReader();

                    // Closure to capture the file information.
                    reader.onload = (function (theFile,i) {
                        return function (e) {
                            // Render thumbnail.
//                            var span = document.createElement('span');
//                            span.innerHTML = ['<img class="thumb" src="', e.target.result,
//                                '" title="', escape(theFile.name), '"/>'].join('');
//                            document.getElementById('list').insertBefore(span, null);

                            $('#doc').append('<tr><th scope="col">' + theFile.name + '</th><th scope="col"><button class="btn-danger stergedoc" data-id="' + i + '">Sterge</button></th></tr>');

                            $('#doc-pdf').html('<embed src="' + e.target.result + '" width="500" height="700">');
                        };
                    })(f,i);

                    // Read in the image file as a data URL.
                    reader.readAsDataURL(f);
                    nr_docs++;
                }

                $('#docid').val(files);
//                var eldata = $(this);
//
//                var el = $('#doc_id' + eldata.data('id'));
//                el.wrap("<form></form>").closest('form').get(0).reset();
//                el.unwrap();
//                $("#doc").html("");
//                $("#doc-pdf").html("");

                }
                );
        });


    </script>


@endsection
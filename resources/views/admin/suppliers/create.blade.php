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
                    {{--{!! Form::label('doc_id', 'Contract fizic:') !!}--}}
                    <div id="upload-btn-wrapper">
                        <button class="btn btn-warning" type="button">Încarcă contracte...</button>
                        {!! Form::file('doc_id', ['class'=>'form-control docid', 'multiple']) !!}
                    </div>
                </div>
            </div>

            <hr>

            <div class="form-group">
                {!! Form::submit('Creare furnizor', ['class'=>'btn btn-primary col-sm-3', 'id' => 'submitbtn']) !!}
            </div>


            <span class="col-sm-6"></span>

            <button type="button" class="btn btn-success col-sm-3"
                     id="btn_renunta">
                Renunță
            </button>
        </div>
        <div class="col-sm-6" id="prev">
            <h1>Documente atasate</h1>
            <div class="row">
                <table class="table table-hover">
                    <thead class="thead-light">
                    <tr>

                        <th scope="col">Document</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="doc">


                    </tbody>
                </table>
                <div class="text-center" id="spin">
                    <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
                </div>
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
            var files = [];

            var token = Math.random().toString(36).slice(-8);

            var formsubmitted = false;
            $("#spin").hide();

            $(window).on('beforeunload', function(e) {

                if(!formsubmitted){
                    $('.stergedoc').each(function(i){

                        var id=$(this).data('id');

                        $.ajax({
                            url: '/delSupplierDoc?id=' + id,
                            success: function(html) {
                                strReturn = html;
                            },
                            async:false
                        });
//                        $.get('/delSupplierDoc?id=' + id, function (data) {
//
//
//
//                        });
                    });
                }


            });



            $('<input>').attr({
                type: 'hidden',
                id: 'token',
                name: 'token',
                value: token
            }).appendTo('form');

//

            $('#docs').on('change', '.docid', function () {


                files = $('.docid')[0].files;

//                $('#doc').html("");
//                $('#doc-pdf').html("");

                for (var i = 0, f; f = files[i]; i++) {


                    var reader = new FileReader();

                    // Closure to capture the file information.
                    reader.onload = (function (theFile, i) {
                        return function (e) {


                            var token = $("#token").val();

                            var _token = $("input[name='_token']").val();

                            var data = new FormData();

                            data.append('_token', _token);
                            data.append('doc_id', theFile);
                            data.append('token', token);

                            $.ajax({
                                url: '/addSupplierDoc',
                                data: data,
                                cache: false,
                                contentType: false,
                                processData: false,
                                beforeSend: function () {
                                    $("#spin").show();
                                },
                                type: 'POST',
                                success: function (data) {
                                    $("#spin").hide();
                                    $('#doc').append(data.tr);
                                    $('#doc-pdf').html(data.embed);
                                },
                                error: function (data) {
                                    $("#spin").hide();
                                    console.log(data);
                                }
                            });


                        };
                    })(f, i);

                    // Read in the image file as a data URL.
                    reader.readAsDataURL(f);


//

                }

                var el = $('.docid');
                el.wrap("<form></form>").closest('form').get(0).reset();
                el.unwrap();
                $("#doc").html("");
                $("#doc-pdf").html("");
//
            });

            $("#doc").on('click', '.stergedoc', function (e) {

                    e.preventDefault();
                    var eldata = $(this);
                    var id = eldata.data('id');

                    $('#tr' + id).remove();




                    $.get('/delSupplierDoc?id=' + id, function (data) {

                        var embd = $('#embd');

                        if (embd.data('id') == id) {

                            if ($("#doc").children().length > 0) {

                                var fis = $("#doc").children().first().children().first().html();
                                $('#doc-pdf').html('<embed src="/documente/furnizori/' + fis + '" width="500" height="700">');

                            }


                        }
                        if ($("#doc").children().length == 0) {

                            $('#doc-pdf').html("");

                        }

                    });

                });

            $('#btn_renunta').click(function (e){



                $('.stergedoc').each(function(i){

                    var id=$(this).data('id');
                    $.get('/delSupplierDoc?id=' + id, function (data) {



                    });
                });
                window.location.replace('{{route('admin.suppliers.index')}}');

            });

            $("#doc").on('click', '.tab-row', function(){

                var doc_id = $(this).children().first().html();
                var id =$(this).find('.stergedoc').data('id');
                $('#doc-pdf').html('<embed id="embd" data-id="' + id + '" src="/documente/furnizori/' + doc_id + '" width="500" height="700">');
            });

            $("#fileupload").on( "submit", function( event ) {


                formsubmitted = true;


            });


        });


    </script>


@endsection
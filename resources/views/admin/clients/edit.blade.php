@extends('layouts.admin')


@section('content')
    <div class="row">
        {!! Form::model($client,['method'=>'PATCH', 'action'=>['AdminClientsController@update',$client->id], 'id'=>'fileupload']) !!}
        <div class="col-sm-6">
            <h1>Modificare client</h1>


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
                {!! Form::label('client_code', 'Cod client:') !!}
                {!! Form::text('client_code', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('haapia', 'HA Apia:') !!}
                {!! Form::text('haapia', null, ['class'=>'form-control','id' => 'apia']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('tip_client', 'Tip client:') !!}
                {!! Form::text('tip_client', null, ['class'=>'form-control','readonly'=>'readonly', 'id' => 'tip']) !!}
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
                {!! Form::label('limita_de_credit', 'Limită de credit:') !!}
                {!! Form::text('limita_de_credit', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('user_id', 'Director de vânzări:') !!}
                {!! Form::select('user_id', ['' => 'Alegeți opțiunea'] + $users, null, ['class'=>'form-control']) !!}
            </div>

            <div id="docs">
                <div class="form-group">
                    {{--{!! Form::label('doc_id', 'Contract fizic:') !!}--}}
                    <div id="upload-btn-wrapper">
                        <button class="btn btn-warning" type="button">Încarcă fișă de client...</button>
                        {!! Form::file('doc_id', ['class'=>'form-control docid', 'multiple']) !!}
                    </div>
                </div>
            </div>

            <hr>

            <div class="form-group">
                {!! Form::submit('Modificare client', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>


            <span class="col-sm-6"></span>

            <button type="button" class="btn btn-success col-sm-3"
                    onclick="location.href='{{route('admin.clients.index')}}'">
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
                    @foreach($clientDocs as $clientDoc)

                        <tr id="tr{{$clientDoc->id}}" class="tab-row">
                            <th scope="col">{{$clientDoc->doc_id}}</th>
                            <th scope="col">
                                <button class="btn-danger stergedoc" data-id="{{$clientDoc->id}}">Sterge</button>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="row" id="doc-pdf">
                @foreach($clientDocs as $clientDoc)

                    <embed id="embd" data-id="{{$clientDoc->id}}" src="/documente/clienti/{{$clientDoc->doc_id}}"
                           width="500" height="700">
                    @break
                @endforeach
            </div>
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


            $('<input>').attr({
                type: 'hidden',
                id: 'token',
                name: 'token',
                value: token
            }).appendTo('form');


            $('#docs').on('change', '.docid', function () {


                files = $('.docid')[0].files;


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
                            data.append('client_id', {{$client->id}});

                            $.ajax({
                                url: '/updClientDoc',
                                data: data,
                                cache: false,
                                contentType: false,
                                processData: false,
                                type: 'POST',
                                success: function (data) {
                                    $('#doc').append(data.tr);
                                    $('#doc-pdf').html(data.embed);
                                },
                                error: function (data) {
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
                //  $("#doc").html("");
                // $("#doc-pdf").html("");
//
            });

            $("#doc").on('click', '.stergedoc', function (e) {

                e.preventDefault();
                var eldata = $(this);
                var id = eldata.data('id');

                $('#tr' + id).remove();




                $.get('/delClientDoc?id=' + id, function (data) {

                    var embd = $('#embd');

                    if (embd.data('id') == id) {

                        if ($("#doc").children().length > 0) {

                            var fis = $("#doc").children().first().children().first().html();
                            $('#doc-pdf').html('<embed src="/documente/clienti/' + fis + '" width="500" height="700">');

                        }


                    }
                    if ($("#doc").children().length == 0) {

                        $('#doc-pdf').html("");

                    }
                });


            });

            $("#doc").on('click', '.tab-row', function(){

                var doc_id = $(this).children().first().html();
                var id =$(this).find('.stergedoc').data('id');
                $('#doc-pdf').html('<embed id="embd" data-id="' + id + '" src="/documente/clienti/' + doc_id + '" width="500" height="700">');
            });

            $('#apia').change(function (){

                var ha = $(this).val();
                if(ha<=100){

                    $("#tip").val("0 - 100 HA");

                }else if(ha<=1000){

                    $("#tip").val("101 - 1000 HA");

                }
                else{

                    $("#tip").val("> 1000 HA");

                }

            });


        });


    </script>


@endsection
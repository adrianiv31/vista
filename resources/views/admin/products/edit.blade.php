@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h1>Modificare produs</h1>

            {!! Form::model($product,['method'=>'PATCH', 'action'=>['AdminProductsController@update',$product->id],'files'=>true]) !!}

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
                {!! Form::submit('Modificare produs', ['class'=>'btn btn-primary col-sm-3']) !!}
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
                    @php $l=1; $doc_id=-1 ;@endphp
                    <tr>


                        @foreach($product->docs as $doc)
                            <th scope="row">{{$l}}</th>
                            <td><a class="docs text-danger"
                                   href="/documente/produse/{{$doc->doc_id}}"> {{$doc->doc_id}}</a></td>
                            <td>
                                <button class="btn-danger" data-toggle="modal" data-target="#siguranta"
                                        data-documentid="{{route('admin.productdocuments.destroy',$doc->id)}}"
                                        data-nume="{{strtoupper($doc->doc_id)}}"
                                        data-rid="{{$product->id}}">Sterge
                                </button>
                            </td>
                            @php
                                if($l==1)
                                    $doc_id=$doc->doc_id;

                                $l++;
                            @endphp

                        @endforeach
                    </tr>
                    </tbody>
                </table>

            </div>
            <div class="row" id="doc-pdf">
                @if($doc_id!=-1)
                    <embed src="/documente/produse/{{$doc->doc_id}}" width="500" height="700">
                @endif
            </div>
        </div>
    </div>

    @include('includes.form_error')

@endsection


<!-- Modal -->
<div class="modal fade" id="siguranta" tabindex="-1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header alert-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ATENȚIE</h4>
            </div>
            <div class="modal-body">
                <p>SIGUR DORIȚI SĂ ȘTERGEȚI DOCUMENTUL</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success col-sm-2" data-dismiss="modal">NU</button>
                <span class="col-sm-8"></span>
                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminProductDocumentsController@destroy', -1],'id'=>'frm']) !!}
                {!! Form::hidden('rid','',['id'=>'ret-id']) !!}
                <div class="form-group">
                    {!! Form::submit('DA', ['class'=>'btn btn-danger col-sm-2','id'=>'sterge']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>


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


                $('#doc-pdf').html('<embed src="' + file + '" width="500" height="700">');
            });

            $(".docs").click(function (event) {
                event.preventDefault();
                $('#doc-pdf').html('<embed src="' + event.target + '" width="500" height="700">');

            });
            $("#doc").on('click','#stergedoc', function(){
                var el = $('#doc_id');
                el.wrap("<form></form>").closest('form').get(0).reset();
                el.unwrap();
                $("#doc").html("");
                $("#doc-pdf").html("");

            });



            ///Modal
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#frm").submit(function (e) {
                e.preventDefault();
            });
            $('#siguranta').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);// Button that triggered the modal
                var recipient = button.data('documentid');
                var nume = button.data('nume');
                var rid = button.data('rid');
                // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                modal.find('.modal-body p').html('SIGUR DORIȚI SĂ ȘTERGEȚI DOCUMENTUL <span class="text-danger" style="font-weight: 900;">' + nume + '</span>');
                modal.find('.modal-footer #sterge').click(function () {
                    $("#frm").attr('action', recipient);
                    $("#ret-id").attr('value', rid);
                    document.getElementById("frm").submit();
                });
            });
        });




    </script>
@endsection
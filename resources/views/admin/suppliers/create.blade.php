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


                <div class="row fileupload-buttonbar">
                    <div class="col-lg-7">
                        <!-- The fileinput-button span is used to style the file input field as button -->
                        <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Adauga contracte...</span>
                            <div class="form-group">

                            {!! Form::file('doc_id[]', ['class'=>'form-control','multiple','id'=>'fisiere']) !!}
                            </div>
                            {{--<input type="file" name="files[]" multiple>--}}
                    </span>

                    </div>

                </div>

                {{--<div class="form-group">--}}
                {{--{!! Form::label('doc_id1', 'Contract fizic:') !!}--}}
                {{--{!! Form::file('doc_id1', ['class'=>'form-control docid']) !!}--}}
                {{--</div>--}}
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
                {{--<table class="table">--}}
                    {{--<thead class="thead-light">--}}
                    {{--<tr>--}}

                        {{--<th scope="col">Document</th>--}}
                        {{--<th scope="col"></th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody id="doc">--}}


                    {{--</tbody>--}}
                {{--</table>--}}
                <!-- The table listing the files available for upload/download -->
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
            </div>
            <div class="row" id="doc-pdf"></div>
        </div>
        {!! Form::close() !!}
    </div>

    @include('includes.form_error')

@endsection

@section('footer')
    <script>
        $(document).ready(function(){
            $('.files').on('click', '.doc', function () {

                var fis = $(this);
                var file = fis.data('fis');

                var files = $('#fisiere')[0].files;

                alert(files.length);
                for (var i = 0, f; f = files[i]; i++) {
                    alert(f);
                }

                $('#doc-pdf').html('<embed src="' + file + '" width="500" height="700">');

            });

        });
    </script>
    {{--<script>--}}
        {{--$(document).ready(function () {--}}

            {{--var nr_docs = 1;--}}

            {{--$('#docs').on('change', '.docid', function () {//.change(function (event) {//.on('change', '.document', function(){//.change(function (event) {--}}


                {{--nr_docs++;--}}

                {{--var html = '<div class="form-group"><label for="doc_id' + nr_docs + '">Contract fizic ' + nr_docs + ':</label><input name="doc_id' + nr_docs + '" type="file" id="doc_id' + nr_docs + '" class="form-control docid"></div>';--}}
                {{--$('#docs').append(html);--}}


                {{--var file = URL.createObjectURL(event.target.files[0]);--}}
                {{--filename = $(this).val();--}}

                {{--$('#doc').append('<tr><th scope="col">' + filename + '</th><th scope="col"><button class="btn-danger stergedoc" data-id="' + (nr_docs - 1) + '">Sterge</button></th></tr>');--}}

                {{--$('#doc-pdf').html('<embed src="' + file + '" width="500" height="700">');--}}
            {{--});--}}

            {{--$("#doc").on('click', '.stergedoc', function () {--}}
                {{--var eldata = $(this);--}}

                {{--var el = $('#doc_id' + eldata.data('id'));--}}
                {{--el.wrap("<form></form>").closest('form').get(0).reset();--}}
                {{--el.unwrap();--}}
{{--//                $("#doc").html("");--}}
{{--//                $("#doc-pdf").html("");--}}

            {{--});--}}
        {{--});--}}


    {{--</script>--}}

    <!-- The template to display files available for upload -->
    <script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td class="doc" data-fis="{%=file.name%}">
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>

        </td>
        <td>

            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Sterge</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}

    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}

    </script>
@endsection
@extends('layouts.admin')

@section('header')

    <meta name="csrf-token" content="{{csrf_token()}}">

@endsection

@section('content')

    @if(Session::has('added_client'))

        <p class="bg-danger">{{session('added_client')}}</p>

    @endif
    @if(Session::has('edited_client'))

        <p class="bg-danger">{{session('edited_client')}}</p>

    @endif
    @if(Session::has('deleted_client'))

        <p class="bg-danger">{{session('deleted_client')}}</p>

    @endif
    <h1>Clienți</h1>

    <div class="row">
        <button class="btn-info" onclick="location.href='{{route('admin.clients.create')}}'">Adaugă Client</button>
    </div>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminClientsController@store']) !!}

    <div class="row">
        <div class="col-sm-8"></div>
        <div class="form-group col-sm-4 has-search">
            <span class="fa fa-search form-control-feedback"></span>
            {!! Form::text('cauta', null, ['class'=>'form-control', 'placeholder'=>'Caută...', 'id'=>'cauta']) !!}
        </div>

    </div>
    {!! Form::close() !!}
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">#</th>
            <th scope="col">Denumire</th>
            <th scope="col">CUI</th>
            <th scope="col">Registrul Comerțului</th>
            <th scope="col">Adresa</th>
            <th scope="col">Cod client</th>
            <th scope="col">HA Apia</th>
            <th scope="col">Tip client</th>
            <th scope="col">Persoana de contact</th>
            <th scope="col">Funcție persoana de contact</th>
            <th scope="col">Telefon persoana de contact</th>
            <th scope="col">Email persoana de contact</th>
            <th scope="col">Director de vânzări</th>
            <th scope="col">Limită de credit</th>
            <th scope="col">Creat</th>
            <th scope="col">Actualizat</th>


        </tr>
        </thead>
        <tbody id="table-content">

        @if($clients)

            @php $i=1; @endphp

            @foreach($clients as $client)

                <tr>
                    <th scope="row">
                        <button class="btn-success"
                                onclick="location.href='{{route('admin.clients.edit',$client->id)}}'">
                            Modifică
                        </button>
                    </th>
                    <th>
                        <button class="btn-danger" data-toggle="modal" data-target="#siguranta"
                                data-clientid="{{route('admin.clients.destroy',$client->id)}}"
                                data-nume="{{strtoupper($client->name)}}">Sterge
                        </button>
                    </th>
                    <th>{{$i}}</th>
                    <td>{{$client->name}}</td>
                    <td>{{$client->cui}}</td>
                    <td>{{$client->reg_com}}</td>
                    <td>{{$client->address}}</td>
                    <td>{{$client->client_code}}</td>
                    <td>{{$client->haapia}}</td>
                    <td>{{$client->tip_client}}</td>
                    <td>{{$client->contact_name}}</td>
                    <td>{{$client->contact_position}}</td>
                    <td>{{$client->contact_tel}}</td>
                    <td>{{$client->contact_email}}</td>
                    <td>{{$client->user->name}}</td>
                    <td>{{$client->limita_de_credit}}</td>
                    <td>{{$client->created_at->diffForHumans()}}</td>
                    <td>{{$client->updated_at->diffForHumans()}}</td>


                </tr>
                @php $i++; @endphp
            @endforeach
        @endif

        </tbody>
    </table>

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
                <p>SIGUR DORIȚI SĂ ȘTERGEȚI CLIENTUL</p>
            </div>
            <div class="modal-footer">
                <div class="form-group col-sm-2">
                    <button type="button" class="btn btn-success btn-block" data-dismiss="modal">NU</button>
                </div>
                <span class="col-sm-8"></span>
                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminClientsController@destroy', -1],'id'=>'frm']) !!}

                <div class="form-group col-sm-2">
                    {!! Form::submit('DA', ['class'=>'btn btn-danger btn-block','id'=>'sterge']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>

@section('footer')
    <script>
        $(document).ready(function () {
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
                var recipient = button.data('clientid');
                var nume = button.data('nume');// Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                modal.find('.modal-body p').html('SIGUR DORIȚI SĂ ȘTERGEȚI CLIENTUL <span class="text-danger" style="font-weight: 900;">' + nume + '</span>');
                modal.find('.modal-footer #sterge').click(function () {
                    $("#frm").attr('action', recipient);
                    document.getElementById("frm").submit();
                });
            });


            $("#cauta").keyup(function () {
                var text = $(this).val();

                $.get('/cautaClient?ss=' + text, function (data) {

                    $("#table-content").empty();
                    $("#table-content").html(data);

                });

            });

        });
    </script>
@endsection
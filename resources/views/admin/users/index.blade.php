@extends('layouts.admin')

@section('header')

    <meta name="csrf-token" content="{{csrf_token()}}">

@endsection

@section('content')

    @if(Session::has('added_user'))

        <p class="bg-danger">{{session('added_user')}}</p>

    @endif
    @if(Session::has('edited_user'))

        <p class="bg-danger">{{session('edited_user')}}</p>

    @endif
    @if(Session::has('deleted_user'))

        <p class="bg-danger">{{session('deleted_user')}}</p>

    @endif
    <h1>Utilizatori</h1>

    <div class="row">
        <button class="btn-info" onclick="location.href='{{route('admin.users.create')}}'">Adaugă utilizator</button>
    </div>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store']) !!}

    <div class="row">
        <div class="col-sm-8"></div>
        <div class="form-goup col-sm-4 has-search">
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
            <th scope="col">Nume</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
            <th scope="col">Status</th>
            <th scope="col">Creat</th>
            <th scope="col">Actualizat</th>


        </tr>
        </thead>
        <tbody id="table-content">

        @if($users)

            @php $i=1; @endphp

            @foreach($users as $user)

                <tr>
                    <th scope="row">
                        <button class="btn-success" onclick="location.href='{{route('admin.users.edit',$user->id)}}'">
                            Modifică
                        </button>
                    </th>
                    <th>
                        <button class="btn-danger" data-toggle="modal" data-target="#siguranta"
                                data-userid="{{route('admin.users.destroy',$user->id)}}" data-nume="{{strtoupper($user->name)}}">Sterge
                        </button>
                    </th>
                    <th>{{$i}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach($user->roles as $role)
                            {{$role->name}}<br/>
                        @endforeach
                    </td>

                    <td>{{$user->is_active == 1 ? 'Activ' : 'Dezactivat'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>

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
                <p>SIGUR DORIȚI SĂ ȘTERGEȚI UTILIZATORUL</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success col-sm-2" data-dismiss="modal">NU</button>
                <span class="col-sm-8"></span>
                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id],'id'=>'frm']) !!}

                <div class="form-goup">
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
                var recipient = button.data('userid');
                var nume = button.data('nume');// Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                modal.find('.modal-body p').html('SIGUR DORIȚI SĂ ȘTERGEȚI UTILIZATORUL <span class="text-danger" style="font-weight: 900;">'+nume+'</span>');
                modal.find('.modal-footer #sterge').click(function () {
                    $("#frm").attr('action', recipient);
                    document.getElementById("frm").submit();
                });
            });



            $("#cauta").keyup(function(){
                var text = $(this).val();

                $.get('/cautaUsers?ss='+text, function (data) {

                    $("#table-content").empty();
                    $("#table-content").html(data);

                });

            });

        });
    </script>
@endsection
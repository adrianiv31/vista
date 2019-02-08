@extends('layouts.admin')

@section('header')

    <meta name="csrf-token" content="{{csrf_token()}}">

@endsection

@section('content')

    @if(Session::has('added_product'))

        <p class="bg-danger">{{session('added_product')}}</p>

    @endif
    @if(Session::has('edited_product'))

        <p class="bg-danger">{{session('edited_product')}}</p>

    @endif
    @if(Session::has('deleted_product'))

        <p class="bg-danger">{{session('deleted_product')}}</p>

    @endif
    <h1>Furnizori</h1>

    <div class="row">
        <button class="btn-info" onclick="location.href='{{route('admin.suppliers.create')}}'">Adaugă furnizor</button>
    </div>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminSuppliersController@store']) !!}

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
            <th scope="col">Cod furnizor</th>
            <th scope="col">Persoana de contact</th>
            <th scope="col">Funcție persoana de contact</th>
            <th scope="col">Telefon persoana de contact</th>
            <th scope="col">Email persoana de contact</th>
            <th scope="col">Data scadentă la plată</th>
            <th scope="col">Creat</th>
            <th scope="col">Actualizat</th>



        </tr>
        </thead>
        <tbody id="table-content">

        @if($suppliers)

            @php $i=1; @endphp

            @foreach($suppliers as $supplier)

                <tr>
                    <th scope="row">
                        <button class="btn-success" onclick="location.href='{{route('admin.products.edit',$supplier->id)}}'">
                            Modifică
                        </button>
                    </th>
                    <th>
                        <button class="btn-danger" data-toggle="modal" data-target="#siguranta"
                                data-supplierid="{{route('admin.products.destroy',$supplier->id)}}" data-nume="{{strtoupper($supplier->name)}}">Sterge
                        </button>
                    </th>
                    <th>{{$i}}</th>
                    <td>{{$supplier->name}}</td>
                    <td>{{$supplier->cui}}</td>
                    <td>{{$supplier->reg_com}}</td>
                    <td>{{$supplier->address}}</td>
                    <td>{{$supplier->supplier_code}}</td>
                    <td>{{$supplier->contact_name}}</td>
                    <td>{{$supplier->contact_position}}</td>
                    <td>{{$supplier->contact_tel}}</td>
                    <td>{{$supplier->contact_email}}</td>
                    <td>{{$supplier->due_date}}</td>
                    <td>{{$supplier->created_at->diffForHumans()}}</td>
                    <td>{{$supplier->updated_at->diffForHumans()}}</td>



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
                <p>SIGUR DORIȚI SĂ ȘTERGEȚI FURNIZORUL</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success col-sm-2" data-dismiss="modal">NU</button>
                <span class="col-sm-8"></span>
                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminSuppliersController@destroy', -1],'id'=>'frm']) !!}

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
                var recipient = button.data('supplierid');
                var nume = button.data('nume');// Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                modal.find('.modal-body p').html('SIGUR DORIȚI SĂ ȘTERGEȚI FURNIZORUL <span class="text-danger" style="font-weight: 900;">'+nume+'</span>');
                modal.find('.modal-footer #sterge').click(function () {
                    $("#frm").attr('action', recipient);
                    document.getElementById("frm").submit();
                });
            });



            $("#cauta").keyup(function(){
                var text = $(this).val();

                $.get('/cautaSupplier?ss='+text, function (data) {

                    $("#table-content").empty();
                    $("#table-content").html(data);

                });

            });

        });
    </script>
@endsection
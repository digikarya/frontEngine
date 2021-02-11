@extends('layout.main')
{{-- @section('breadcrumb')
@endsection --}}
@section('header-left')
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Tambah Data {{ $title }}</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('header-right')
    {{-- <button class="btn btn-primary">Tambah Data Baru</button> --}}
@endsection
@section('mainpage')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                {{-- <div class="card-header header-elements-inline">
                    <h6 class="card-title">Form Input Data</h6>
                </div> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route($url) }}" method="POST">
                                <fieldset class="mb-3">
                                    @csrf

                                    <legend class="text-uppercase font-size-sm font-weight-bold">{{ $title }}</legend>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Nomor Trayek</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="no_trayek" value="@isset($result){{ $result['no_trayek'] }}@endisset">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Daerah Asal</label>
                                        <div class="col-lg-9">
                                            <select name="asal" id="daerah" class="form-control" >
                                                @isset($result)
                                                    <option value="{{$result['asal']}}" selected>{{ Str::upper($result['asal']) }}</option>
                                                @endisset
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-success col-lg-1 " data-toggle="modal"
                                            id="btnDaerah" data-target="#modal_daerah"><i
                                                class="icon-folder-search"></i></button>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Daerah Tujuan</label>
                                        <div class="col-lg-9">
                                            <select name="tujuan" id="tujuan" class="form-control" >
                                                @isset($result)
                                                    <option value="{{$result['asal']}}" selected>{{ Str::upper($result['tujuan']) }}</option>
                                                @endisset
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-success col-lg-1 " data-toggle="modal"
                                            id="btnTujuan" data-target="#modal_Tujuan"><i
                                                class="icon-folder-search"></i></button>
                                    </div>


                                    @isset($result)
                                        @method('PUT')
                                        <input type="hidden" value="{{ $result['id'] }}" name="id">

                                    @endisset
                                </fieldset>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @isset($result)
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Detail Check List</h6>
                        <button type="button" class="btn btn-primary" data-toggle="modal" id="btnDetail" data-target="#modal_trayek">TAMBAH DETAIL</button>
                    </div>
                    <div class="card-body py-0">
                        <div class="row">

                        </div>
                    </div>
                    @isset($result['detail'])
                    <table class="table datatable-basic">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th >Agen</th>
                                <th >Daerah</th>
                                <th >Urutan</th>
                                <th width="5%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result['detail'] as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ Str::ucfirst($item['nama']) }}</td>
                                    <td>{{ Str::ucfirst($item['nama_daerah']) }}</td>
                                    <td>{{ Str::ucfirst($item['sequence']) }}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <a class="dropdown-item" href="#" onclick="event.preventDefault();  document.getElementById('delete-form-{{$loop->index+1}}').submit();">
                                                        {{ __('Delete') }}
                                                    </a>
                                                    <form id="delete-form-{{ $loop->index+1 }}" action="{{ route('trayek.detail.delete') }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method("delete")
                                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                        <input type="hidden" name="trayek_id" value="{{ $result['id'] }}">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @endisset

                </div>
            </div>
        </div>

        <div id="modal_trayek" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Trayek</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route("trayek.detail.create") }}" method="POST">
                            <fieldset class="mb-3">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Agen</label>
                                    <div class="col-lg-9">
                                        <select name="agen_id" id="agen" class="form-control" >
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-success col-lg-1 " data-toggle="modal"
                                        id="btnDaerah" data-target="#modal_agen"><i
                                            class="icon-folder-search"></i></button>
                                </div>
                            </fieldset>
                            <input type="hidden" name="trayek_id" value="{{ $result['id'] }}">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal_agen" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Data agen</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form id="searchFormagen" method="POST" >
                            @csrf
                            <div class="form-group row">
                                {{-- <label class="col-form-label col-lg-2">Nama</label> --}}
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="ketikan yang ingin anda cari" name="value" >

                                </div>
                                <button type="submit" class="btn btn-primary col-md-2" >Cari <i
                                        class="icon-paperplane ml-2"></i></button>

                            </div>

                        </form>
                        <table class="table " id="tableagen">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="30%">Nama</th>
                                    <th width="30%">Nomor Telepon</th>
                                    <th width="30%">Tipe Agen</th>
                                    <th width="30%">Alamat</th>
                                    <th width="5%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> --}}
                        {{-- <button type="button" class="btn bg-primary">Save changes</button> --}}
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var dataSet = [];
            $('#tableagen').dataTable({
                    data: dataSet,
                    autoWidth: false,
                    columnDefs: [
                        {"className": "text-center", "targets": 4},
                        {
                        orderable: false,
                        width: 100,
                        targets: [ 3 ]
                    }],
                    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                    language: {
                        search  : '<span>Filter:</span> _INPUT_',
                        searchPlaceholder: 'Type to filter...',
                        lengthMenu: '<span>Show:</span> _MENU_',
                        paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                    }
            });
            async function agenCari() {
                    const url = '{{ route("search.actAgen") }}';
                    let response = await fetch(url, {
                        method: "POST",
                        body: new FormData(document.getElementById("searchFormagen")),

                    })
                    .then(response => response.json())
                    .then(data => {
                            str = "";
                            index = 0;
                            var dataSet = [];
                            var table = document.getElementById('tableagen');
                            for (const item of data) {
                                console.log(item);
                                btna = "<button class='btn btn-primary btn-pilih-agen' onclick='clickagen(this)' data-id='"+item.id+"' data-name='"+item.nama.toUpperCase()+"'>Pilih</button>";
                                dataSet.push( [(index+1),item.nama.toUpperCase(),item.telpon.toUpperCase(),item.tipe.toUpperCase(),item.alamat,btna]);
                                index++;
                            }

                            $('#tableagen').DataTable().clear().rows.add(dataSet).draw();
                            // $('#tableagen').dataTable().clear().rows.add(dataSet).draw();
                            // console.log(dataSet);

                    })
                    .catch(data => {
                        console.log(data);
                        $('#modal_agen').modal('hide');
                        $(document).ready(function() {
                            (  new PNotify({
                                title: 'Terjadi kesalahan',
                                text: "Silakan cek kembali inputan anda",
                                addclass: 'bg-primary border-primary',
                                type: 'info',
                                addclass: 'bg-danger border-danger',
                                hide: false
                            }));
                        });
                    });
            }


            function clickagen(event){
                $('#modal_agen').modal('hide');
                $("#agen").find('option').remove().end()
                $("#agen").append(new Option($(event).data('name'), $(event).data('id')));


                // alert("data-id:"+$(event).data('id'));
            }

            $( "#searchFormagen" ).submit(function( e ) {
                e.preventDefault();
                agenCari();
                // alert("asd");
            });
        </script>

    @endisset



    <div id="modal_daerah" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data Daerah</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form id="searchFormDaerah" method="POST" >
                        @csrf
                        <div class="form-group row">
                            {{-- <label class="col-form-label col-lg-2">Nama</label> --}}
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="ketikan yang ingin anda cari" name="value" >

                            </div>
                            <button type="submit" class="btn btn-primary col-md-2" >Cari <i
                                    class="icon-paperplane ml-2"></i></button>

                        </div>

                    </form>
                    <table class="table " id="tableDaerah">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="30%">Kecamatan</th>
                                <th width="30%">Kabupaten</th>
                                <th width="30%">Provinsi</th>
                                <th width="5%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> --}}
                    {{-- <button type="button" class="btn bg-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var dataSet = [];
        $('#tableDaerah').dataTable({
                data: dataSet,
                autoWidth: false,
                columnDefs: [
                    {"className": "text-center", "targets": 4},
                    {
                    orderable: false,
                    width: 100,
                    targets: [ 3 ]
                }],
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    search  : '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Type to filter...',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
        });
        async function daerahCari() {
                const url = '{{ route("search.actDaerah") }}';
                let response = await fetch(url, {
                    method: "POST",
                    body: new FormData(document.getElementById("searchFormDaerah")),

                })
                .then(response => response.json())
                .then(data => {
                        str = "";
                        index = 0;
                        var dataSet = [];
                        var table = document.getElementById('tableDaerah');
                        for (const item of data) {
                            btna = "<button class='btn btn-primary btn-pilih-daerah' onclick='clickDaerah(this)' data-id='"+item.Kecamatan+"' data-name='"+item.Kecamatan.toUpperCase()+","+item.kabupaten.toUpperCase()+"'>Pilih</button>";
                            dataSet.push( [(index+1),item.Kecamatan.toUpperCase(),item.kabupaten.toUpperCase(),item.provinsi.toUpperCase(),btna]);
                            index++;
                        }

                        $('#tableDaerah').DataTable().clear().rows.add(dataSet).draw();
                        // $('#tableDaerah').dataTable().clear().rows.add(dataSet).draw();
                        // console.log(dataSet);

                })
                .catch(data => {
                    $('#modal_daerah').modal('hide');
                    $(document).ready(function() {
                        (  new PNotify({
                            title: 'Terjadi kesalahan',
                            text: "Silakan cek kembali inputan anda",
                            addclass: 'bg-primary border-primary',
                            type: 'info',
                            addclass: 'bg-danger border-danger',
                            hide: false
                        }));
                    });
                });
        }


        function clickDaerah(event){
            $('#modal_daerah').modal('hide');
            $("#daerah").find('option').remove().end()
            $("#daerah").append(new Option($(event).data('name'), $(event).data('id')));

            @isset($result)
                $("#daerah").append(new Option("{{ $result['tujuan'] }}", "{{ $result['asal'] }}" ));
            @endisset

            // alert("data-id:"+$(event).data('id'));
        }

        $( "#searchFormDaerah" ).submit(function( e ) {
            e.preventDefault();
            daerahCari();
            // alert("asd");
        });
    </script>

<div id="modal_Tujuan" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Tujuan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="searchFormTujuan" method="POST" >
                    @csrf
                    <div class="form-group row">
                        {{-- <label class="col-form-label col-lg-2">Nama</label> --}}
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="ketikan yang ingin anda cari" name="value" >

                        </div>
                        <button type="submit" class="btn btn-primary col-md-2" >Cari <i
                                class="icon-paperplane ml-2"></i></button>

                    </div>

                </form>
                <table class="table " id="tableTujuan">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="30%">Kecamatan</th>
                            <th width="30%">Kabupaten</th>
                            <th width="30%">Provinsi</th>
                            <th width="5%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> --}}
                {{-- <button type="button" class="btn bg-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var dataSet = [];
    $('#tableTujuan').dataTable({
            data: dataSet,
            autoWidth: false,
            columnDefs: [
                {"className": "text-center", "targets": 4},
                {
                orderable: false,
                width: 100,
                targets: [ 3 ]
            }],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search  : '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
    });
    async function TujuanCari() {
            const url = '{{ route("search.actDaerah") }}';
            let response = await fetch(url, {
                method: "POST",
                body: new FormData(document.getElementById("searchFormTujuan")),

            })
            .then(response => response.json())
            .then(data => {
                    str = "";
                    index = 0;
                    var dataSet = [];
                    var table = document.getElementById('tableTujuan');
                    for (const item of data) {
                        btna = "<button class='btn btn-primary btn-pilih-Tujuan' onclick='clickTujuan(this)' data-id='"+item.Kecamatan+"' data-name='"+item.Kecamatan.toUpperCase()+","+item.kabupaten.toUpperCase()+"'>Pilih</button>";
                        dataSet.push( [(index+1),item.Kecamatan.toUpperCase(),item.kabupaten.toUpperCase(),item.provinsi.toUpperCase(),btna]);
                        index++;
                    }

                    $('#tableTujuan').DataTable().clear().rows.add(dataSet).draw();
                    // $('#tableTujuan').dataTable().clear().rows.add(dataSet).draw();
                    // console.log(dataSet);

            })
            .catch(data => {
                $('#modal_Tujuan').modal('hide');
                $(document).ready(function() {
                    (  new PNotify({
                        title: 'Terjadi kesalahan',
                        text: "Silakan cek kembali inputan anda",
                        addclass: 'bg-primary border-primary',
                        type: 'info',
                        addclass: 'bg-danger border-danger',
                        hide: false
                    }));
                });
            });
    }


    function clickTujuan(event){
        $('#modal_Tujuan').modal('hide');
        $("#tujuan").find('option').remove().end()
        $("#tujuan").append(new Option($(event).data('name'), $(event).data('id')));

        @isset($result)
            $("#tujuan").append(new Option("{{ $result['tujuan'] }}", "{{ $result['tujuan'] }}" ));
        @endisset

        // alert("data-id:"+$(event).data('id'));
    }

    $( "#searchFormTujuan" ).submit(function( e ) {
        e.preventDefault();
        TujuanCari();
        // alert("asd");
    });
</script>

@endsection



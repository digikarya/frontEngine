
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
                                        <label class="col-form-label col-lg-2">Kode</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="kode" value="@isset($result){{ $result['kode'] }}@endisset">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Nama</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="nama" value="@isset($result){{ $result['nama'] }}@endisset">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Check List Kendaraan</label>
                                        <div class="col-lg-9">
                                            <select name="check_list_id" id="CheckList" class="form-control" >
                                                @isset($result)
                                                    <option value="{{$result['check_list_id']}}" selected> {{ $result['check_list'] }}</option>
                                                @endisset
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-success col-lg-1 " data-toggle="modal"
                                            id="btnCheckList" data-target="#modal_CheckList"><i
                                                class="icon-folder-search"></i></button>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Jenis Kendaraan</label>
                                        <div class="col-lg-9">
                                            <select name="jenis_kendaraan_id" id="JenisKendaraan" class="form-control" >
                                                @isset($result)
                                                    <option value="{{$result['jenis_kendaraan_id']}}" selected> {{ $result['jenis_kendaraan'] }}</option>
                                                @endisset
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-success col-lg-1 " data-toggle="modal"
                                            id="btnJenisKendaraan" data-target="#modal_JenisKendaraan"><i
                                                class="icon-folder-search"></i></button>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Layout Kursi Kendaraan</label>
                                        <div class="col-lg-9">
                                            <select name="layout_id" id="Layout" class="form-control" >
                                                @isset($result)
                                                    <option value="{{$result['layout_id']}}" selected> {{ $result['layout'] }}</option>
                                                @endisset
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-success col-lg-1 " data-toggle="modal"
                                            id="btnLayout" data-target="#modal_Layout"><i
                                                class="icon-folder-search"></i></button>
                                    </div>
                                    @isset($result)
                                        @method('PUT')
                                        <input type="hidden" value="{{ $result['id'] }}" name="id">
                                        <script>
                                        </script>
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

    <div id="modal_CheckList" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data Jenis Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form id="searchFormCheckList" method="POST" >
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
                    <table class="table " id="tableCheckList">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="30%">Jenis Kendaran</th>
                                <th width="30%">Merek</th>
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
            $('#tableCheckList').dataTable({
                    data: dataSet,
                    autoWidth: false,
                    columnDefs: [
                        {"className": "text-center", "targets": 3},
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
            async function CheckListCari() {
                    const url = '{{ route("search.actCheckList") }}';
                    let response = await fetch(url, {
                        method: "POST",
                        body: new FormData(document.getElementById("searchFormCheckList")),

                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.massage == "data tidak ditemukan"){
                            $(document).ready(function() {
                                (  new PNotify({
                                    title: 'Terjadi kesalahan',
                                    text: "Data tidak ditemukan",
                                    type: 'info',
                                    addclass: 'bg-info border-info',
                                    hide: false
                                }));
                            });
                        }else{
                            str = "";
                            index = 0;
                            var dataSet = [];
                            var table = document.getElementById('tableCheckList');
                            for (const item of data.data) {
                                btna = "<button class='btn btn-primary btn-pilih-CheckList' onclick='clickCheckList(this)' data-id='"+item.id+"' data-name='"+item.jenis_kendaraan+" - "+item.merek+"'>Pilih</button>";
                                dataSet.push( [(index+1),item.jenis_kendaraan,item.merek,btna]);
                                index++;
                            }

                            $('#tableCheckList').DataTable().clear().rows.add(dataSet).draw();
                        }


                    })
                    .catch(data => {
                        $('#modal_CheckList').modal('hide');
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


            function clickCheckList(event){
                $('#modal_CheckList').modal('hide');
                $("#CheckList").find('option').remove().end()
                $("#CheckList").append(new Option($(event).data('name'), $(event).data('id')));

                @isset($result)
                    $("#CheckList").append(new Option("{{ $result['check_list'] }}", "{{ $result['check_list_id'] }}" ));
                @endisset

                // alert("data-id:"+$(event).data('id'));
            }

            $( "#searchFormCheckList" ).submit(function( e ) {
                e.preventDefault();
                CheckListCari();
                // alert("asd");
            });
    </script>



<div id="modal_JenisKendaraan" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Jenis Kendaraan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="searchFormJenisKendaraan" method="POST" >
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
                <table class="table " id="tableJenisKendaraan">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="30%">Nama</th>
                            <th width="30%">Kode</th>
                            <th width="30%">Jenis</th>
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
        $('#tableJenisKendaraan').dataTable({
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
        async function JenisKendaraanCari() {
                const url = '{{ route("search.actJenisKendaraan") }}';
                let response = await fetch(url, {
                    method: "POST",
                    body: new FormData(document.getElementById("searchFormJenisKendaraan")),

                })
                .then(response => response.json())
                .then(data => {
                    if(data.massage == "data tidak ditemukan"){
                        $(document).ready(function() {
                            (  new PNotify({
                                title: 'Terjadi kesalahan',
                                text: "Data tidak ditemukan",
                                type: 'info',
                                addclass: 'bg-info border-info',
                                hide: false
                            }));
                        });
                    }else{
                        str = "";
                        index = 0;
                        var dataSet = [];
                        var table = document.getElementById('tableJenisKendaraan');
                        for (const item of data.data) {
                            console.log(item);
                            btna = "<button class='btn btn-primary btn-pilih-JenisKendaraan' onclick='clickJenisKendaraan(this)' data-id='"+item.id+"' data-name='"+item.nama+"'>Pilih</button>";
                            dataSet.push( [(index+1),item.nama,item.kode,item.jenis,btna]);
                            index++;
                        }

                        $('#tableJenisKendaraan').DataTable().clear().rows.add(dataSet).draw();
                    }


                })
                .catch(data => {
                    $('#modal_JenisKendaraan').modal('hide');
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


        function clickJenisKendaraan(event){
            $('#modal_JenisKendaraan').modal('hide');
            $("#JenisKendaraan").find('option').remove().end()
            $("#JenisKendaraan").append(new Option($(event).data('name'), $(event).data('id')));

            @isset($result)
                $("#JenisKendaraan").append(new Option("{{ $result['jenis_kendaraan'] }}", "{{ $result['jenis_kendaraan_id'] }}" ));
            @endisset

            // alert("data-id:"+$(event).data('id'));
        }

        $( "#searchFormJenisKendaraan" ).submit(function( e ) {
            e.preventDefault();
            JenisKendaraanCari();
            // alert("asd");
        });
</script>






<div id="modal_Layout" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Layout</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="searchFormLayout" method="POST" >
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
                <table class="table " id="tableLayout">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="30%">Nama</th>
                            <th width="30%">Total Kursi</th>
                            <th width="30%">Jumlah Kolom Kiri</th>
                            <th width="30%">Jumlah Kolom Kanan</th>
                            <th width="30%">Kursi Belakang</th>
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
        $('#tableLayout').dataTable({
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
        async function LayoutCari() {
                const url = '{{ route("search.actLayout") }}';
                let response = await fetch(url, {
                    method: "POST",
                    body: new FormData(document.getElementById("searchFormLayout")),

                })
                .then(response => response.json())
                .then(data => {
                    if(data.massage == "data tidak ditemukan"){
                        $(document).ready(function() {
                            (  new PNotify({
                                title: 'Terjadi kesalahan',
                                text: "Data tidak ditemukan",
                                type: 'info',
                                addclass: 'bg-info border-info',
                                hide: false
                            }));
                        });
                    }else{
                        str = "";
                        index = 0;
                        var dataSet = [];
                        var table = document.getElementById('tableLayout');
                        for (const item of data.data) {
                            console.log(item);
                            btna = "<button class='btn btn-primary btn-pilih-Layout' onclick='clickLayout(this)' data-id='"+item.id+"' data-name='"+item.nama+"'>Pilih</button>";
                            dataSet.push( [(index+1),item.nama,item.total_seat,item.kolom_kiri,item.kolom_kanan,item.seat_belakang,btna]);
                            index++;
                        }

                        $('#tableLayout').DataTable().clear().rows.add(dataSet).draw();
                    }


                })
                .catch(data => {
                    $('#modal_Layout').modal('hide');
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


        function clickLayout(event){
            $('#modal_Layout').modal('hide');
            $("#Layout").find('option').remove().end()
            $("#Layout").append(new Option($(event).data('name'), $(event).data('id')));

            @isset($result)
                $("#Layout").append(new Option("{{ $result['layout'] }}", "{{ $result['layout_id'] }}" ));
            @endisset

            // alert("data-id:"+$(event).data('id'));
        }

        $( "#searchFormLayout" ).submit(function( e ) {
            e.preventDefault();
            LayoutCari();
            // alert("asd");
        });
</script>


@endsection



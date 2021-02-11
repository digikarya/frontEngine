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
                                    <label class="col-form-label col-lg-2">Jenis Kendaraan</label>
                                    <div class="col-lg-10">
                                        <select name="jenis_kendaraan" id="jenis_kendaraan" class="form-control" >
                                            @isset($result)
                                                <option value="{{$result['jenis_kendaraan']}}" selected>{{ Str::upper($result['jenis_kendaraan']) }}</option>
                                            @endisset
                                            <option value="MOBIL SEDAN">MOBIL SEDAN</option>
                                            <option value="MINI BUS">MINI BUS</option>
                                            <option value="BUS SEDANG">BUS SEDANG</option>
                                            <option value="BUS BESAR">BUS BESAR</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Kategori Kendaraan</label>
                                    <div class="col-lg-9">
                                        <select name="kategori_kendaraan_id" id="KategoriKendaraan" class="form-control" >
                                            @isset($result)
                                                <option value="{{$result['kategori_kendaraan_id']}}" selected>{{ Str::upper($result['kategori']) }}</option>
                                            @endisset
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-success col-lg-1 " data-toggle="modal"
                                        id="btnkategori" data-target="#modal_KategoriKendaraan"><i
                                            class="icon-folder-search"></i></button>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Trayek</label>
                                    <div class="col-lg-9">
                                        <select name="trayek_id" id="Trayek" class="form-control" >
                                            @isset($result)
                                                <option value="{{$result['trayek_id']}}" selected>{{ Str::upper($result['trayek']) }}</option>
                                            @endisset
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-success col-lg-1 " data-toggle="modal"
                                        id="btntrayek" data-target="#modal_Trayek"><i
                                            class="icon-folder-search"></i></button>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Nomor Kendaraan</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="no_kendaraan"
                                            value="@isset($result){{ $result['no_kendaraan'] }}@endisset">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Nomor Mesin</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="no_mesin"
                                            value="@isset($result){{ $result['no_mesin'] }}@endisset">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Nomor Rangka</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="no_rangka"
                                            value="@isset($result){{ $result['no_rangka'] }}@endisset">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Kapasitas Maksimal Penumpang</label>
                                    <div class="col-lg-10">
                                        <input type="number" class="form-control" name="max_seat"
                                            value="@isset($result){{ $result['max_seat'] }}@endisset">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Daya Angkut</label>
                                    <div class="col-lg-10">
                                        <input type="number" class="form-control" name="daya_angkut"
                                            value="@isset($result){{ $result['daya_angkut'] }}@endisset">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Kapasitas Mesin</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="kapasitas_mesin"
                                            value="@isset($result){{ $result['kapasitas_mesin'] }}@endisset">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Tahun Pembuatan</label>
                                    <div class="col-lg-10">
                                        <?php
                                        $years = range(1900, strftime("%Y", time()));
                                        $years = collect($years)->sort()->reverse()->toArray();
                                        ?>
                                        <select class="form-control" name="tahun_pembuatan">
                                            @isset($result)
                                                <option value="{{$result['tahun_pembuatan']}}" selected>{{ $result['tahun_pembuatan'] }}</option>
                                            @endisset
                                            <option>Pilih Tahun</option>
                                            <?php foreach($years as $year) : ?>
                                                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Pemilik Kendaraan</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="pemilik"
                                            value="@isset($result){{ $result['pemilik'] }}@endisset">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Merek</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="merk"
                                            value="@isset($result){{ $result['merk'] }}@endisset">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Kode Unit</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="kode_unit"
                                            value="@isset($result){{ $result['kode_unit'] }}@endisset">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Nomor Body</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="no_body"
                                            value="@isset($result){{ $result['no_body'] }}@endisset">
                                    </div>
                                </div>


                                @isset($result)
                                    @method('GET')
                                    <input type="hidden" value="{{ $result['id'] }}" name="id">
                                    <script>

                                    </script>
                                @endisset
                            </fieldset>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit <i
                                        class="icon-paperplane ml-2"></i></button>
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
                <h6 class="card-title">Surat Kendaran</h6>
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
                        <th >Jenis Surat</th>
                        <th >Nomor Surat</th>
                        <th >Tanggal</th>
                        <th >Keterangan</th>
                        <th >Status</th>
                        <th width="5%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result['detail'] as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ Str::ucfirst($item['jenis_surat']) }}</td>
                            <td>{{ Str::ucfirst($item['no_surat']) }}</td>
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









<div id="modal_Trayek" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Trayek</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="searchFormTrayek" method="POST" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Cari Berdasarkan</label>
                        <div class="col-lg-10">
                            <select name="searchby" id="searchby" class="form-control" onchange="changeSearch()">
                                <option value="0" selected>Kode Trayek</option>
                                <option value="1">Asal dan Tujuan</option>
                            </select>
                        </div>
                    </div>
                    <script>
                        function changeSearch() {
                          var x = document.getElementById("searchby");
                          var value = x.options[x.selectedIndex].value;
                          if (value == "0"){
                            document.getElementById("daerah").style.display = "none";
                            document.getElementById("kode").style.display = "unset";
                          }
                          if (value == "1"){
                            document.getElementById("daerah").style.display = "unset";
                            document.getElementById("kode").style.display = "none";
                          }
                        //   x.value = x.value.toUpperCase();
                        }
                    </script>

                    <div id="daerah"  style="display: none">
                        <div class="form-group row" >
                            <div class="col-lg-6">
                                <input type="text" class="form-control" placeholder="Ketikan nama daerah asal" name="asal" >
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" placeholder="Ketikan nama daerah tujuan" name="tujuan" >
                            </div>
                        </div>
                    </div>

                    <div id="kode">
                        <div class="form-group row"  >
                            <div class="col-lg-12">
                                <input type="text" class="form-control" placeholder="ketikan kode trayek" name="kode" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary col-lg-2 offset-lg-10" >Cari <i
                            class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
                <table class="table " id="tableTrayek">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="30%">Kode Trayek</th>
                            <th width="30%">Asal</th>
                            <th width="30%">Tujuan</th>
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
    $('#tableTrayek').dataTable({
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
    async function TrayekCari() {
            const url = '{{ route("search.actTrayek") }}';
            let response = await fetch(url, {
                method: "POST",
                body: new FormData(document.getElementById("searchFormTrayek")),

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
                        var table = document.getElementById('tableTrayek');
                        for (const item of data) {
                            btna = "<button class='btn btn-primary btn-pilih-CheckList' onclick='clickTrayek(this)' data-id='"+item.id+"' data-name='"+item.no_trayek.toUpperCase()+" | "+item.asal.toUpperCase()+" - "+item.tujuan.toUpperCase()+"'>Pilih</button>";
                            dataSet.push( [(index+1),item.no_trayek.toUpperCase(),item.asal.toUpperCase(),item.tujuan.toUpperCase(),btna]);
                            index++;
                        }
                        $('#tableTrayek').DataTable().clear().rows.add(dataSet).draw();
                    }
                    // console.log(dataSet);

            })
            .catch(data => {
                $('#modal_Trayek').modal('hide');
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


    function clickTrayek(event){
        $('#modal_Trayek').modal('hide');
        $("#Trayek").find('option').remove().end()
        $("#Trayek").append(new Option($(event).data('name'), $(event).data('id')));

        @isset($result)
            @php
            @endphp
        @endisset

        // alert("data-id:"+$(event).data('id'));
    }

    $( "#searchFormTrayek" ).submit(function( e ) {
        e.preventDefault();
        TrayekCari();
        // alert("asd");
    });
</script>



<div id="modal_KategoriKendaraan" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Jenis Kendaraan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="searchFormKategoriKendaraan" method="POST" >
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
                <table class="table " id="tableKategoriKendaraan">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="30%">Nama</th>
                            <th width="30%">Kode</th>
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
        $('#tableKategoriKendaraan').dataTable({
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
        async function KategoriKendaraanCari() {
                const url = '{{ route("search.actKategoriKendaraan") }}';
                let response = await fetch(url, {
                    method: "POST",
                    body: new FormData(document.getElementById("searchFormKategoriKendaraan")),

                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
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
                        var table = document.getElementById('tableKategoriKendaraan');
                        for (const item of data.data) {
                            console.log(item);
                            btna = "<button class='btn btn-primary btn-pilih-KategoriKendaraan' onclick='clickKategoriKendaraan(this)' data-id='"+item.id+"' data-name='"+item.nama.toUpperCase()+" - "+item.kode.toUpperCase()+"'>Pilih</button>";
                            dataSet.push( [(index+1),item.nama.toUpperCase(),item.kode.toUpperCase(),btna]);
                            index++;
                        }

                        $('#tableKategoriKendaraan').DataTable().clear().rows.add(dataSet).draw();
                    }


                })
                .catch(data => {
                    console.log(data);
                    $('#modal_KategoriKendaraan').modal('hide');
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


        function clickKategoriKendaraan(event){
            $('#modal_KategoriKendaraan').modal('hide');
            $("#KategoriKendaraan").find('option').remove().end()
            $("#KategoriKendaraan").append(new Option($(event).data('name'), $(event).data('id')));

            @isset($result)
                $("#KategoriKendaraan").append(new Option("{{ $result['kategori_kendaraan_id'] }}", "{{ $result['kategori_kendaraan_id'] }}" ));
            @endisset

            // alert("data-id:"+$(event).data('id'));
        }

        $( "#searchFormKategoriKendaraan" ).submit(function( e ) {
            e.preventDefault();
            KategoriKendaraanCari();
            // alert("asd");
        });
</script>


@endsection

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
                                    <legend class="text-uppercase font-size-sm font-weight-bold">Tambah data {{ $title }} untuk {{ $nama }}</legend>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Email</label>
                                        <div class="col-lg-10">
                                            <input type="email" class="form-control" name="email" value="@isset($result){{ $result['email'] }}@endisset">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Password</label>
                                        <div class="col-lg-10">
                                            <input type="password" class="form-control" name="password" value="@isset($result){{ $result['password'] }}@endisset">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Role</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" name="role" id="role">
                                                <option value="staff">Staff</option>
                                                <option value="teknisi">Teknisi</option>
                                                <option value="operasional">Operasional</option>
                                                <option value="supir">Supir</option>
                                                <option value="kondektur">Kondektur</option>
                                                <option value="cs">CS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Agen</label>
                                        <div class="col-lg-9">
                                            <select name="agen" id="agen" class="form-control" >
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-success col-lg-1 " data-toggle="modal"
                                            id="btnDaerah" data-target="#modal_agen"><i
                                                class="icon-folder-search"></i></button>
                                    </div>
                                    <input type="hidden" name="karyawan" value="{{ $karyawan_id }}" name="id">
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

            @isset($result)
                @php
                    $agen  = Str::upper($result['kecamatan']).", ".Str::upper($result['kabupaten']);
                @endphp
                $("#agen").append(new Option("{{ $agen }}", "{{ $result['agen_id'] }}" ));
            @endisset

            // alert("data-id:"+$(event).data('id'));
        }

        $( "#searchFormagen" ).submit(function( e ) {
            e.preventDefault();
            agenCari();
            // alert("asd");
        });
    </script>

@endsection



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
                                    <label class="col-form-label col-lg-2">Waktu Keberangkatan</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control time"
                                            value="@isset($result){{ $result['waktu_keberangkatan'] }}@endisset">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Waktu Kedatangan</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control time"
                                            value="@isset($result){{ $result['waktu_kedataangan'] }}@endisset">
                                    </div>
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
<script>
    $(".time").clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        default: 'now',
        donetext: "Select",
        init: function() {

            },
            beforeShow: function() {
                console.log("before show");
            },
            afterShow: function() {
                console.log("after show");
            },
            beforeHide: function() {
                console.log("before hide");
            },
            afterHide: function() {
                console.log("after hide");
            },
            beforeHourSelect: function() {
                console.log("before hour selected");
            },
            afterHourSelect: function() {
                console.log("after hour selected");
            },
            beforeDone: function() {
                console.log("before done");
            },
            afterDone: function() {
                console.log("after done");
            }
    });

</script>


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


@endsection

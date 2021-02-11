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
                                        <label class="col-form-label col-lg-2">Merek Kendaraan</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="merek" value="@isset($result){{ $result['merek'] }}@endisset">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Jenis Kendaraan</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" name="jenis_kendaraan" id="jenis_kendaraan">
                                                <option value="MOBIL SEDAN">Sedan</option>
                                                <option value="MINI BUS">Mini Bus</option>
                                                <option value="BUS SEDANG">Bus Sedang</option>
                                                <option value="BUS BESAR">Bus Besar</option>
                                            </select>
                                        </div>
                                    </div>

                                    @isset($result)
                                        @method('PUT')
                                        <input type="hidden" value="{{ $result['id'] }}" name="id">
                                        <script>
                                                document.getElementById('jenis_kendaraan').value = "{{ $result['jenis_kendaraan'] }}";
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

    @isset($result)
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Detail Check List</h6>
                        <button type="button" class="btn btn-primary" data-toggle="modal" id="btnDetail" data-target="#modal_CheckList">TAMBAH DETAIL</button>
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
                                <th >Nama Check List</th>
                                <th >Tipe Check List</th>
                                <th width="5%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result['detail'] as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ Str::ucfirst($item['nama']) }}</td>
                                    <td>{{ Str::ucfirst($item['tipe']) }}</td>
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
                                                    <form id="delete-form-{{ $loop->index+1 }}" action="{{ route('checklist.detail.delete') }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method("delete")
                                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                        <input type="hidden" name="check_list_id" value="{{ $result['id'] }}">
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

        <div id="modal_CheckList" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Check List</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route("checklist.detail.create") }}" method="POST">
                            <fieldset class="mb-3">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Nama</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="nama" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Tipe</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="tipe" id="tipe">
                                            <option value="MESIN">Mesin</option>
                                            <option value="KAKI-KAKI">Kaki - Kaki</option>
                                            <option value="KOPLING">Kopling</option>
                                            <option value="OLI">Oli</option>
                                            <option value="BAN">Ban</option>
                                            <option value="AC">AC</option>
                                        </select>
                                    </div>
                                </div>

                            </fieldset>
                            <input type="hidden" name="check_list_id" value="{{ $result['id'] }}">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endisset
@endsection



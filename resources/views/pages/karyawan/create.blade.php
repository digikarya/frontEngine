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
                                        <label class="col-form-label col-lg-2">Nama</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="nama" value="@isset($result){{ $result['nama'] }}@endisset">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Nomor Identitas</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="no_identitas" value="@isset($result){{ $result['no_identitas'] }}@endisset">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Jenis Kelamin</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                <option value="pria">Pria</option>
                                                <option value="wanita">Wanita</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Jabatan</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" name="jabatan" id="jabatan">
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
                                        <label class="col-form-label col-lg-2">Telepon</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="telepon" value="@isset($result){{ $result['telepon'] }}@endisset">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Alamat</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="alamat" value="@isset($result){{ $result['alamat'] }}@endisset">
                                        </div>
                                    </div>

                                    @isset($result)
                                        @method('PUT')
                                        <input type="hidden" value="{{ $result['id'] }}" name="id">
                                        <script>
                                            document.getElementById('jabatan').value = "{{ $result['jabatan'] }}";
                                            document.getElementById('jenis_kelamin').value = "{{ $result['jenis_kelamin'] }}";

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
                        <h6 class="card-title">Data user milik {{ $result['nama'] }}</h6>
                        <a class="btn btn-primary" href="#" onclick="event.preventDefault();  document.getElementById('create-form-user').submit();">
                            {{ __('Tambah User') }}
                        </a>
                        <form id="create-form-user" action="{{ route('user.create.form') }}" method="POST" style="display: none;">
                            @csrf
                            @method("GET")
                            <input type="hidden" name="karyawan_id" value="{{ $result['id'] }}">
                            <input type="hidden" name="nama" value="{{ $result['nama'] }}">
                        </form>
                    </div>
                    <div class="card-body py-0">
                        <div class="row">

                        </div>
                    </div>
                    @isset($detail)
                        <table class="table datatable-basic">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="30%">Email</th>
                                    <th width="30%">Agen</th>
                                    <th width="30%">Role</th>
                                    <th width="5%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail as $item)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ Str::ucfirst($item['email']) }}</td>
                                        <td>{{ Str::ucfirst($item['agen']) }}</td>
                                        <td>{{ Str::ucfirst($item['role']) }}</td>
                                        <td class="text-center">
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" onclick="event.preventDefault();  document.getElementById('update-form-{{$loop->index+1}}').submit();">
                                                            {{ __('Lihat Detail') }}
                                                        </a>
                                                        {{-- <a class="dropdown-item" href="#" onclick="event.preventDefault();  document.getElementById('delete-form-{{$loop->index+1}}').submit();">
                                                            {{ __('Delete') }}
                                                        </a> --}}
                                                        <form id="update-form-{{ $loop->index+1 }}" action="{{ route($endpoint.'.show') }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method("PUT")
                                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                        </form>
                                                        {{-- <form id="delete-form-{{ $loop->index+1 }}" action="{{ route($endpoint.'.delete') }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method("delete")
                                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                        </form> --}}
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
    @endisset
@endsection



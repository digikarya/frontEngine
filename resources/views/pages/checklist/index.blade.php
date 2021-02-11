@extends('layout.main')
{{-- @section('breadcrumb')
@endsection --}}
@section('header-left')
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - {{ $title }}</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('header-right')
    <a class="btn btn-primary" href="{{ route($endpoint.".create") }}"> Tambah Data Baru</a>
@endsection
@section('mainpage')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Data {{ $title }}</h6>
                </div>
                <div class="card-body py-0">
                    <div class="row">

                    </div>
                </div>
                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th >Merek Kendaraan</th>
                            <th >Jenis Kendaraan</th>
                            <th width="5%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ Str::ucfirst($item['merek']) }}</td>
                                <td>{{ Str::ucfirst($item['jenis_kendaraan']) }}</td>
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
                                                <a class="dropdown-item" href="#" onclick="event.preventDefault();  document.getElementById('delete-form-{{$loop->index+1}}').submit();">
                                                    {{ __('Delete') }}
                                                </a>
                                                <form id="update-form-{{ $loop->index+1 }}" action="{{ route($endpoint.'.show') }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method("GET")
                                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                </form>
                                                <form id="delete-form-{{ $loop->index+1 }}" action="{{ route($endpoint.'.delete') }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method("delete")
                                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

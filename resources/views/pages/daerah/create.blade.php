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
                                    @isset($result)
                                        @method('PUT')
                                        <input type="hidden" value="{{ $result['id'] }}" name="id">
                                    @endisset
                                    <legend class="text-uppercase font-size-sm font-weight-bold">{{ $title }}</legend>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Kecamatan</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="kecamatan" value="@isset($result){{ $result['Kecamatan'] }}@endisset">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Kabupaten</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="kabupaten" value="@isset($result){{ $result['kabupaten'] }}@endisset">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Provinsi</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="provinsi" value="@isset($result){{ $result['provinsi'] }}@endisset">
                                        </div>
                                    </div>

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
@endsection



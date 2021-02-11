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
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3">Nama</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" name="nama"
                                                    value="@isset($result){{ $result['nama'] }}@endisset">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3">Jumlah Barisi Kiri</label>
                                            <div class="col-lg-7">
                                                <input type="number" min="1" class="form-control" name="baris_kiri"
                                                    value="@isset($result){{ $result['baris_kiri'] }}@endisset">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3">Jumlah Kolom Kiri</label>
                                            <div class="col-lg-7">
                                                <input type="number" min="1" class="form-control" name="kolom_kiri"
                                                    value="@isset($result){{ $result['kolom_kiri'] }}@endisset">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3">Jumlah Barisi Kanan</label>
                                            <div class="col-lg-7">
                                                <input type="number" min="1" class="form-control" name="baris_kanan"
                                                    value="@isset($result){{ $result['baris_kanan'] }}@endisset">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3">Jumlah Kolom Kanan</label>
                                            <div class="col-lg-7">
                                                <input type="number" min="1" class="form-control" name="kolom_kanan"
                                                    value="@isset($result){{ $result['kolom_kanan'] }}@endisset">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3">Jumlah Seat Belakang</label>
                                            <div class="col-lg-7">
                                                <input type="number" min="0" class="form-control" name="seat_belakang"
                                                    value="@isset($result){{ $result['seat_belakang'] }}@endisset">
                                            </div>
                                        </div>
                                        @isset($result)
                                            @method('PUT')
                                            <input type="hidden" value="{{ $result['id'] }}" name="id">
                                            <script>

                                            </script>
                                        @endisset
                                    </div>
                                    <div></div>
                                </div>
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



@endsection

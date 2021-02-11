@extends('layout.main')
{{-- @section('breadcrumb')
@endsection --}}
@section('header-left')
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - {{ $endpoint }}</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('header-right')
    {{-- <a class="btn btn-primary" href="{{ route(strtolower($title).".create") }}"> Tambah Data Baru</a> --}}
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
                        <form  method="POST">
                            <fieldset class="mb-3">
                                @csrf

                                <legend class="text-uppercase font-size-sm font-weight-bold">{{ $title }}</legend>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Cari Kendaraan</label>
                                    <div class="col-lg-9">
                                        <input type="hidden" name="kendaraan_id" id="kendaraan_id">
                                        <input type="text" class="form-control" name="kendaraan" id="kendaraan" placeholder="Ketikan nomor plat atau nomor body">
                                    </div>
                                    <button type="button" class="btn btn-success col-lg-1 " data-toggle="modal"
                                        id="btnDaerah" data-target="#modal_daerah"><i
                                            class="icon-folder-search"></i></button>
                                </div>
                            </fieldset>

                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Data Kendaraaan</legend>

                                <div class="row">

                                    <div class="col-lg-5">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4">Nomor Kendaraan</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="no_kendaraan"
                                                    value="Z 1234 AB @isset($result){{ $result['no_kendaraan'] }}@endisset" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4">Nomor Mesin</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="no_mesin"
                                                    value="MSN91231222II @isset($result){{ $result['no_mesin'] }}@endisset" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4">Nomor Rangka</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="no_rangka"
                                                    value="RANK91231222II @isset($result){{ $result['no_rangka'] }}@endisset" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4">Kapasitas Maksimal Penumpang</label>
                                            <div class="col-lg-8">
                                                <input type="number" class="form-control" name="max_seat"
                                                    value="50">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4">Daya Angkut</label>
                                            <div class="col-lg-8">
                                                <input type="number" class="form-control" name="daya_angkut"
                                                    value="200">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4">Kapasitas Mesin</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="kapasitas_mesin"
                                                    value="1500 @isset($result){{ $result['kapasitas_mesin'] }}@endisset" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4">Tahun Pembuatan</label>
                                            <div class="col-lg-8">
                                                <input type="year" class="form-control" name="tahun_pembuatan"
                                                    value="2010 @isset($result){{ $result['tahun_pembuatan'] }}@endisset" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 offset-lg-1">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4">Pemilik Kendaraan</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="pemilik"
                                                    value="PT HS Budiman 45 @isset($result){{ $result['pemilik'] }}@endisset" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4">Merek</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="merk"
                                                    value="Mercedesz Benz @isset($result){{ $result['merk'] }}@endisset" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4">Kode Unit</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="kode_unit"
                                                    value="BC-3E105-T @isset($result){{ $result['kode_unit'] }}@endisset" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4">Nomor Body</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="no_body"
                                                    value="3E-105  @isset($result){{ $result['no_body'] }}@endisset" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4">Kategori Kendaraan</label>
                                            <div class="col-lg-8">
                                                <select name="kategori" id="kategori" class="form-control" >
                                                    <option value="" selected>BCB01 - BIS CEPAT BUDIMAN</option>
                                                    @isset($result)
                                                        <option value="{{$result['kategori_kendaraan_id']}}" selected>{{ Str::upper($result['kategori']) }} </option>
                                                    @endisset
                                                </select>

                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4">Trayek</label>
                                            <div class="col-lg-8">
                                                <select name="trayek" id="trayek" class="form-control" >
                                                    <option value="" selected>Tasikmalaya - Yogyakarta</option>

                                                    @isset($result)
                                                        <option value="{{$result['trayek_id']}}" selected>{{ Str::upper($result['trayek']) }}</option>
                                                    @endisset
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <input type="hidden" name="jadwal_id" id="jadwal_id" >
                            </fieldset>
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Surat Kendaraan</legend>
                                <table class="table datatable-basic">
                                    <thead>
                                        <tr>
                                            <th width="20%">Jenis Surat</th>
                                            <th width="35%">Nomor Surat</th>
                                            <th width="25%">Kadaluarsa</th>
                                            <th width="20%" >Tanggal Pembuatan Surat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>STNK</td>
                                            <td>123544555544</td>
                                            <td>10 Maret 2022</td>
                                            <td>10 Maret 2018</td>
                                        </tr>
                                        <tr>
                                            <td>BPKB</td>
                                            <td>123544555544</td>
                                            <td>15 Mei 2022</td>
                                            <td>15 Mei 2018</td>
                                        </tr>
                                        <tr class="bg-warning">
                                            <td>KPS</td>
                                            <td>123544555544</td>
                                            <td>01 Februari 2021</td>
                                            <td>01 Februari 2017</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Check List Kondisi Kendaraan</legend>
                                <table class="table table-bordered">
                                        <tr>
                                            <th colspan="4">Oli</th>
                                        </tr>
                                        <tr>
                                            <td width="1%"></td>
                                            <td >Oli Mesin</td>
                                            <td  width="20%" class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="radio-inline-left" checked data-fouc>
                                                       Normal
                                                    </label>
                                                </div>

                                            </td>
                                            <td  width="20%" class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="radio-inline-left" data-fouc>
                                                        Perlu Perbaikan
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="1%"></td>
                                            <td >Oli Kopling</td>
                                            <td  width="20%" class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="radio-inline-left" checked data-fouc>
                                                       Normal
                                                    </label>
                                                </div>

                                            </td>
                                            <td  width="20%" class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="radio-inline-left" data-fouc>
                                                        Perlu Perbaikan
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Kondisi AC</th>
                                        </tr>
                                        <tr>
                                            <td width="1%"></td>
                                            <td >AC</td>
                                            <td  width="20%" class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="radio-inline-left" checked data-fouc>
                                                       Normal
                                                    </label>
                                                </div>

                                            </td>
                                            <td  width="20%" class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="radio-inline-left" data-fouc>
                                                        Perlu Perbaikan
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Kondisi Ban</th>
                                        </tr>
                                        <tr>
                                            <td width="1%"></td>
                                            <td >Ban</td>
                                            <td  width="20%" class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="radio-inline-left" checked data-fouc>
                                                       Normal
                                                    </label>
                                                </div>

                                            </td>
                                            <td  width="20%" class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="radio-inline-left" data-fouc>
                                                        Perlu Perbaikan
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                </table>
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

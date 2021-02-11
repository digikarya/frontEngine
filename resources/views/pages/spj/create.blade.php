@extends('layout.main')
{{-- @section('breadcrumb')
@endsection --}}
@section('header-left')
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Pembuatan {{ $title }}</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('header-right')
    <a class="btn btn-primary" href="{{ route(strtolower($endpoint).".create") }}"> Tambah Data Baru</a>
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
                            @csrf
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Jadwal yang dipilih</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Keberangkatan</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="jadwalKedatangan" value="07:00 Tasikmalaya" readonly>
                                    </div>
                                    <button type="button" class="btn btn-success col-lg-1 " data-toggle="modal"
                                        id="btnjadwal" data-target="#modal_jadwal"><i
                                            class="icon-folder-search"></i></button>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Kedatangan</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="jadwalKedatangan"  value="18:00 Yogyakarta" readonly>
                                    </div>
                                </div>
                                <input type="hidden" name="jadwal_id" id="jadwal_id" >
                            </fieldset>
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Kendaraan yang dipilih</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Nomor Plat</label>
                                    <div class="col-lg-9">

                                        <input type="text" class="form-control" id="noPlat" value="Z 1234 AB" readonly>
                                    </div>
                                    <button type="button" class="btn btn-success col-lg-1 " data-toggle="modal"
                                        id="btnkendaraan" data-target="#modal_kendaraan"><i
                                            class="icon-folder-search"></i></button>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Nomor Body</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="noBody" value="FC-1234"  readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Kategori Kendaraan</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="kategoriKendaraan" value="First Class"  readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Kapasitas Penumpang</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="kapasitasKendaraan"   value="36 Kursi" readonly>
                                    </div>
                                </div>
                                <input type="hidden" name="kendaraan_id" id="kendaraan_id" >
                            </fieldset>
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Supir yang dipilih</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Nama Supir </label>
                                    <div class="col-lg-9">
                                        <input type="text"  name="supir" id="supir" class="form-control" value="Asep - 081233544458"  readonly>
                                    </div>
                                    <button type="button" class="btn btn-success col-lg-1 " data-toggle="modal"
                                        id="btnSupir" data-target="#modal_Supir"><i
                                            class="icon-folder-search"></i></button>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Nama Supir</label>
                                    <div class="col-lg-9">
                                        <input type="text"  name="kondektur" id="kondektur" class="form-control" value="Rizqi - 081233521158"  readonly>
                                    </div>
                                    <button type="button" class="btn btn-success col-lg-1 " data-toggle="modal"
                                        id="btnKondektur" data-target="#modal_Kondektur"><i
                                            class="icon-folder-search"></i></button>
                                </div>
                                <input type="hidden" name="supir_id" id="supir_id" >
                                <input type="hidden" name="kondektur_id" id="kondektur_id" >
                            </fieldset>

                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Supir yang dipilih</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Tanggal Keberangkatan</label>
                                    <div class="col-lg-9">
                                        <input type="date"  name="tanggal" id="tanggal" class="form-control" value=""  >
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Uang Saku</label>
                                    <div class="col-lg-9">
                                        <input type="text"  name="uang" id="uang" class="form-control" value="500000"  >
                                    </div>
                                </div>
                                <input type="hidden" name="supir_id" id="supir_id" >
                                <input type="hidden" name="kondektur_id" id="kondektur_id" >
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

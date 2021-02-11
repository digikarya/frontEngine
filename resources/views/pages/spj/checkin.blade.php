@extends('layout.main')
{{-- @section('breadcrumb')
@endsection --}}
@section('header-left')
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - SPJ - Check In Penumpang</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('header-right')
    <a class="btn btn-primary" href="{{ route(strtolower($title).".create") }}"> Tambah Data Baru</a>
@endsection
@section('mainpage')

<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Tempat Duduk</h6>
            </div>
            <div class="card-body py-0">
                <div class="card bg-light mb-3" >
                    <div class="card-body">
                        <table class="table " >
                            @php
                                $klm_kiri = 2;
                                $brs_kiri = 8;
                                $klm_kanan = 2;
                                $brs_kanan = 9;
                                $seat_blkg = 5;
                                $max = $brs_kanan;
                                $totalKlm = $klm_kanan + $klm_kiri + 1;
                                if ($brs_kiri > $brs_kanan) {
                                    $max = $brs_kiri;
                                }
                                $kursi = 1;
                                for ($i=0; $i < $max; $i++) {
                                    echo "<tr>";
                                    for ($j=0; $j < $totalKlm; $j++) {
                                        // echo ' <td class="text-center border">'.$j .'</td>';
                                            // $kursi++;
                                        if ($j == ($klm_kiri)) {
                                            echo ' <td style="border:0;"></td>';
                                        }else{
                                            if ($j < $klm_kiri) {
                                                if ($i < $brs_kiri) {
                                                    echo ' <td class="text-center border">'. sprintf("%02d", $kursi).'</td>';
                                                    $kursi++;
                                                }else{
                                                    echo ' <td style="border:0;"></td>';
                                                }
                                            }else{
                                                if ($j < $totalKlm) {
                                                    if ($i < $brs_kanan) {
                                                        echo ' <td class="text-center border">'. sprintf("%02d", $kursi).'</td>';
                                                        $kursi++;
                                                    }else{
                                                        echo ' <td style="border:0;"></td>';
                                                    }
                                                }
                                            }



                                        }
                                    }
                                    echo "</tr>";
                                }
                                for ($i=0; $i < $seat_blkg; $i++) {
                                    if ($i == 0) {
                                        echo "<tr>";
                                    }
                                    echo ' <td class="text-center border">'. sprintf("%02d", $kursi).'</td>';
                                    if ($i > $seat_blkg) {
                                        echo "</tr>";
                                    }
                                    $kursi++;

                                }
                            @endphp

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Data Penumpang</h6>
            </div>
            <div class="card-body ">
                <form action="" method="POST">
                    @csrf
                    <fieldset class="mb-3">
                        {{-- <legend class="text-uppercase font-size-sm font-weight-bold">Jadwal yang dipilih</legend> --}}
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Nomor Kursi</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="no_kursi" name="no_kursi" value="01">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Nama Penumpang</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="nama" name="nama" value="Asep">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Kode Tiket</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="kode_tiket" name="kode_tiket">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Nomor HP</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="08123123122">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Titik Naik</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="titik_naik" name="titik_naik" value="Tasikmalaya">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Titik Naik</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="titik_turun" name="titik_turun" value="Bekasi">
                            </div>
                        </div>
                        <input type="hidden" name="jadwal_id" id="jadwal_id" >
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
@endsection
